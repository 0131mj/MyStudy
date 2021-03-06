# 자바스크립트 객체 멤버



## 1. 객체 멤버 관리



### 멤버 구분

- 생성자 멤버 : 생성자에 정의 된 멤버, 함수모델에서 공개 변수 스코프에 추가되는 멤버임.
- 인스턴스 멤버 : 생성자에서 this를 이용해 정의하는 멤버
- 프로토타입 멤버 : 프로토타입 객체에 정의되는 멤버





### 객체의 구조 및 멤버 접근

- 자바스크립트는 'key - value' 방식의 연상 배열 형태로 되어있고, (마치 복주머니 속의 동전처럼)순서가 없다. 
- key는 고유한 문자열 형태이어야 하며, value에는 어떤 값도 들어갈 수 있다. 
- 객체 멤버에는 '.' 로도 접근 가능하고, [ ]로 접근할 수도 있다.
- 자바스크립트에는 일반 객체지향 언어에서 지원하는 overload 개념은 지원되지 않는다. 즉, 매개변수만 다르다면 동일한 이름의 메서드를 여러 개 정의할 수 있는 일반 객체지향 언어와는 다르다. 




### 객체 멤버 관리 구조

```javascript
function Person(name){
    this.name = name;
    this.setNewName = function(newName){
    	this.name = newName;
	}
}

var mySon = new Person(); 
mySon.setNewName("달봉이"); 
```

1. 자바스크립트 엔진이 mySon.setNewName("달봉이")를 만나면 mySon에 저장된 값이 참조타입의 값이라는 것을 알게 된다. 
2. 그 참조값이 가리키는 연상배열 구조의 객체로 이동해 setNewName을 찾는다. 
3. setNewName또한 참조타입의 변수라는 사실을 알고 또 해당 값이 가리키는 곳으로 간다. 
4. 그 곳에서 찾은 멤버에 ()연산자와 전달된 인자로 코드 블록을 호출하고, 함수의 코드 블록이 파싱과 실행 단계를 거친다. 





### 멤버 === var 변수

자바스크립트 객체는 'key - value' 구조이고 런타임에서 실행을 해보기 전까지는 value가 속성인지 메서드인지 알수 없다. 모든 멤버는 var 변수로 칭할 수 있게 되는 것이다. 실행시에 괄호를 붙이면 메서드(함수)인 것이고 안 붙이면 값이다. 그렇기 때문에 자바스크립트에서는 속성과 메서드를 이름만 보고도 구분할 수 있도록 네이밍을 잘 하는 것이 중요하다. 



### 생성자 멤버와 객체 멤버

생성자 멤버는 공개되어 있으며, 생성자로 생성한 객체의 멤버와는 별도의 영역에서 관리 된다. 

객체의 멤버는 인스턴스 멤버와 프로토타입의 멤버로 구분된다. 

구조로 나타내면 다음과 같다. 

- 생성자 멤버
- 객체 멤버
  - 인스턴스 멤버
  - 프로토타입 멤버



### 멤버 접근, 관리

#### 멤버 접근

```javascript
Person.Description = 'desc';
console.log(Person.Description) //desc

var obj = new Person();
console.log(obj.Description) //에러

console.log(obj.prototype.Description) //desc
```

생성자 함수에 멤버를 동적으로 추가하는 것은 가능하지만, 그 속성이 생성자로 만든 객체에도 있는 것은 아니다. 

해당 멤버는 prototype으로 접근을 해야 한다.



#### 멤버 제거

```javascript
delete obj.propertyA;
```

멤버를 삭제할 때는 delete 키워드를 사용한다. 



#### 멤버 순회, 존재 확인

##### hasOwnProperty 메서드

hasOwnProperty 메서드는 객체 안에 키네임에 해당하는 멤버가 있는지를 확인한 다음에 결과를 boolean 타입으로 리턴해주는 내장함수이다. 

```javascript
var obj = {
    prop : "exist"
}
console.dir(obj.hasOwnProperty('prop')); //true
console.dir(obj.hasOwnProperty('hasOwnProperty')); //false
console.dir(obj.myMethod('')) //Uncaught TypeError: obj.myMethod is not a function
```

코드상으로 보자면 obj라는 객체 안에는 hasOwnProperty라는 메소드가 없기 때문에 실행이 되지 않는 것이 정상이다. 하지만 객체안에서는 객체의 내장함수를 사용할 수 있도록 해준다. 여기서 주의할 점은, hasOwnProperty라는 메소드 명에서 짐작할 수 있듯, <u>객체내부에 생성한 고유의 Property에 대해서만 true값을 리턴</u>해준다는 사실이다. 그래서 hasOwnProperty는 '사용은 가능하지만 고유의 멤버는 아니기 때문에' false를 출력한다. 



##### in 연산자

```javascript
var myCar = {make:"Hyundai", model: "포니", year: 1970};
"make" in myCar ; //true
"hasOwnProperty" in myCar ; //true

var myArr = ['a','b','c'];
0 in myArr; //true

myArr.textKey = 'txt'
"textKey" in myArr // true
```

in 연산자로도 객체 내에 멤버가 있는지 확인할 수 있다. 

"문자열" in 객체명 형태로 boolean 결과를 도출해낼 수 있는데,  hasOwnProperty와 다른 점은, 고유의 property가 아닌 내장객체의 멤버를 조회할 경우에도 true를 반환한다는 점이다.  

숫자를 사용하면 배열에서 n번째 원소가 있는지를 확인하는 데 쓸 수 있다. 자바스크립트 배열은 키가 텍스트 형태인 연상배열 형태를 취할 수 있는데, in 연산자 앞에 텍스트를 넣어 배열에서 그 텍스트를 키로 하는 밸류가 있는지 확인이 가능하다. 



##### 멤버순회 : for/in

```javascript
for(far property in object){
    // property 사용
}
    
var a = [];
for (var propertyName in o)
a.push(propertyName)
```

- 상속에 의해 부모에게 물려받은 멤버도 모두 출력
- 인스턴스 멤버 뿐만 아니라 프로토타입 멤버도 출력해준다. 
- 내장멤버는 출력되지 않는다.




## 2. prototype, constructor, 인스턴스

```javascript
function Person(name){
    this.name = name
}
```

- Person을 파싱해서 정의하면, 최종적으로 생성자 객체와 프로토타입 객체가 함께 정의됨

  ```sequence
  prototype -> constructor : 참조
  constructor -> prototype : 참조
  ```

  ### prototype 속성

  Person 생성자에는 prototype이라는 공개속성이 있는데, 이 속성을 통해 프로토타입 객체에 접근 할 수 있다. 

  ```javascript
  Person.prototype
  ```

- 생성자, 프로토타입 객체 : 함수 정의시 함께 정의됨.

- 인스턴스 : 생성을 해서 얻게되는 객체.