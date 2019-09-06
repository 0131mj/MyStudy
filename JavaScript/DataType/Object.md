# Object : 객체

객체와 함수는 자바스크립트에서 가장 중요한 개념이다. 

- 객체
  - 함수
  - 배열
- 숫자
- 문자
- 불린
- null
- undefined



## 1. 객체란?

객체는 해쉬형태로 이루어진, 프로퍼티(key : value 형태)를 저장하는 컨테이너

```javascript
//apple object
var apple = {
	color : 'red',   //color property
  	taste : 'sweet'  //taste property
}
```



#### * 키 값 표기 규정

객체의 키값은 다음과 같이 표기해야만 한다. 

- 따옴표가 생략된 string형태(기본적으로 따옴표를 생략 가능하지만, 명기해줘도 무방함.)
- 단, 숫자가 먼저오는 혼합된 텍스트의 경우 반드시 따옴표를 써줘야 한다.  
  (순수한 숫자는 따옴표를 써주지 않아도 된다.)
- 키값은 중복이 되지만, 중복이 될 경우 나중에 선언된 키값의 밸류가 최종적인 객체의 키값과 밸류가 된다. 

```javascript
var red = 'yon';

var obj = {
    fruit : 'banana',
    'color' : red,
    16 : 'sixteen',
    '16' : 'sixteen',
    18 : this.fruit,
    true : 'abcd',
    '6x': 'eeee',
    5x : 'xxx' //error
}
```





## 2. 객체의 정의 및 생성

자바스크립트에서 객체를 만들어 내기 위해 사용하는 방법은 3가지가 있다. 

1. 자바스크립트 내장 생성자 이용 - new Object()
2. 사용자 정의 생성자 이용 - new Person()
3. 객체 리터럴 이용 - {}



#### * 생성자란?

자바스크립트에서는 다른 언어와 다르게 클래스가 존재하지 않는다. 

대신, 자바스크립트에서는 함수를 사용하여 객체를 생성한다. 

객체를 생성하는 데 사용하는 함수를 특별히 생성자(constructor)함수라고 부른다. 





### 1) 자바스크립트 내장 생성자 이용



#### 객체의 정의 방법 

```javascript
var mySon = new Object();
mySon.Name = "달봉이";
```

- 객체를 new를 사용해서 생성했다. 이처럼 new와 함께 사용되어 새로운 객체를 만드는 함수를 생성자(constructor)라고 한다. 
- 위에서 Object 생성자는 자바스크립트에서 기본적으로 제공해주는 생성자다. Object 외에도 자바스크립트에서 기본적으로 제공해주는 생성자는 많다.
  String, Number, Boolean, Array, Date, Function, Object, RegExp, Math ...
- 요런 애들을 생성자라고 부르는 대신 '내장 객체' 혹은 '내장 타입'이라고 부르기도 한다. 
- 내장객체라고 특별할 것은 없으며 자바스크립트 엔진은 다음과 유사하게 정의된 함수를 기본적으로 메모리에 저장한다고 보면 된다. 내장 생성자도 함수 모델을 그대로 따른다. 

```javascript
function Object(){
	//...
}

function String(){
    //...
}

function Number(){
    //...
}
```





### 2) 사용자 객체 정의 이용

일반 객체지향 언어에서 클래스를 사용해 객체를 생성하는 방법과 가장 유사한 방법이다. 
다음은 자바에서 Person이라는 클래스를 정의하고 객체를 생성하는 방법이다. 

##### * Java 에서의 객체 생성 방법

```java
public class Person{
    public string Name;
    // 생성자
    public Person(name, age){this.Name=name; ...}
}

//객체 생성
mySon = new Person(...);
```

일반 객체지향 언어에서는 이처럼 객체를 정의하는 코드와 초기화 작업을 하는 코드가 함께 클래스로 묶여 있다. 또한 객체를 생성하고 나면 동적으로 다른 멤버를 추가할 수 없다. 



#### JavaScript 사용자 지정 객체 정의

```javascript
function Person(name){
    this.name = name;
    this.setNewName = function(newName){
    	this.name = newName;
	}
}
```

- 자바스크립트에서 class의 역할을 하는 것은 function이다.  function은 자바스크립트에서 여러가지 기능을 수행하는데, 이처럼 생성자 역할을 하는 함수를 정의할 때는 관례적으로 대문자로 시작하도록 함수명을 짓는다. 
- 객체의 멤버를 정의할 때 this를 사용한다. 익명함수를 변수명에 할당하여 메서드를 멤버로 추가할 수 있다. 



#### 객체 생성

앞에서 정의한 Person 생성자를 new 키워드와 함께 호출하면 객체를 생성할 수 있다.  

```javascript
var mySon = new Person("달봉이");
var mySon = new Person(); //생성자 매개변수 name은 undefined로 설정됨
var mySon = new Person; //생성자 매개변수 name은 undefined로 설정됨
```

생성자를 new와 사용할 때는 세번째 구문처럼 ()연산자를 생략해도 된다. 인자없이 인스턴스를생성하면 매개변수는 undefined로 설정된다. 

this로 정의된 멤버는 new로 생성되는 인스턴스 별로 존재한다. 이 인스턴스 멤버는 프로토타입 멤버와 대비되는 개념으로, 해당 객체에만 영향을 준다. 



### 3) 객체 리터럴 이용

```javascript
var mySon ={
    Name : "달봉이",
    Age : 7,
    IncreaseAge = function(i){this.Age + i};
}
```

리터럴은 풀어서 직접기재하여 객체를 정의하는 방식이다. 코드가 간결하고 가독성이 높아서 객체 생성구문으로 많이 사용된다. 

객체 리터럴을 사용해 객체를 생성하는 방법은 내부적으로 new Object를 수행한 후 멤버를 구성하는 방법과 동일한 절차를 따른다. 또한 이렇게 정의된 멤버는 모두 외부에서 접근할 수 있는 공개 멤버이다. 



---



#### * ES6 객체 생성 

```javascript
let i = 0;
const obj = {
    [i++]: 3,
    [i++]: 4,
}

console.log(obj); // {"0":3,"1":4}
```

- 위에서 부터 순서대로 만들어지므로, 예시와 같은 연산결과도 돌릴 수 있다. 





## 3. 객체 다루기

### 1) 프로퍼티 다루기

#### (1) 조회하기

```javascript
var sixTeen = 16;
var fruit = 16;
var various = 'fruit'
var obj = {
    fruit : 'banana',
    16 : 'sixteen'
}

/*대괄호 방식*/
console.log(obj['fruit']);  //banana 	--- (1)
console.log(obj['sixTeen']);//undefined --- (2)
console.log(obj['16']); 	//sixteen 	--- (3)
console.log(obj[16]); 		//sixteen 	--- (4)
console.log(obj[fruit]);    //sixteen 	--- (5)
console.log(obj[sixTeen]); 	//sixteen 	--- (6)
console.log(obj[various]); 	//banana 	--- (7)

/*점(.)방식*/
console.log(obj.sixTeen); 	//undefined
```

**조회 방식에는 대괄호를 사용한 조회와 '.'을 사용한 조회, 두가지 방식이 있다.** 

1. 대괄호로 조회시 : 

   1. string  :  (1), (2), (3)

      - 따옴표로 둘러싸여져 있는 경우 (string인 경우) : 
        해당 객체에서 key값을 그 따옴표 안의 내용 (텍스트로 조회한다.)

   2. 숫자 : (4)

      - 숫자는 변수명이 될 수 없다. 가능성은 두 가지다. 

        1. 하나는 동일한 키 값을 바로 찾는 로직일 수도 있고,
        2. 다른 하나는 toString()함수를 통해 숫자를 텍스트로 변환을 시도한 다음에 찾는 것일 수도 있다. 

         16 -> '16'
        하지만 (3)과 (4)의 결과가 동일한 것을 볼 때 대괄호안에 오는 것을 최종적으로는 string 형태로 변환시켜서 찾는다고 유추해볼 수 있다. 
        또한, (4)와 (5)처럼 따옴표가 없는 키값으로 바로 조회한다고 볼수 도 없는 게, (5)에서는 변수명으로 간주했기 때문이다.  

        숫자가 오면 스트링 형태로 변환한다. 

   3. 변수명 :  (5), (6) 

      - 따옴표가 없는 텍스트는 변수명을 뜻한다. 

```
  - 변수명이 올 경우 1차적으로 변수의 값을 괄호 속에 치환한다.
  - 다음에 가져온 값이 string이 아니라 숫자라면, 다시 toString을 변환해서 조회한다.
```

2. '.'을 통한 조회시 :  키 값 텍스트로만 조회 (따옴표 없음)
   1. '.' 표기법을 사용할 경우, 숫자나 따옴표는 올 수 없으며 오로지 <u>따옴표가 없는 텍스트만</u> 올 수 있다. 
      - 하지만 따옴표가 없다고 해서 이 텍스트가 변수명인 것은 아니며, 오로지 키값일 뿐이다. 

종합해보면, 

- 객체 안에 있는 데이터를 대괄호 방식으로 조회하려면  최종적으로 string 자료형을 사용해야 한다. 
- [ ] 안에 있는 데이터가 따옴표가 있는 string 리터럴일 경우 바로 키값을 조회한다.   ---(1)
- [ ] 안에 있는 데이터가 숫자일 경우 .toString()메서드를 사용해 형변환을 시도한다.  ---(4)
- [ ] 안에 있는 데이터가 변수명일 경우 일단 변수의 값을 가져온다. 가져온 변수명을 toString()으로 string 형태로 변환을 시도하고, 다시 그 값을 조회한다.  

- 키값이 숫자텍스트로 된 string일 경우, 프로퍼티에 접근하기 위해선 대괄호방식을 사용할 수 밖에 없다. 




#### (2) 프로퍼티 삭제 : 

- delete 연산자 이용



#### (3) 프로퍼티 수정



### 2) ES6 객체 순회 : 반복하여 나타내는 방법

```javascript
const obj = {
  b: 6,
  a: 5,
  [Symbol()]: 7,
  "-100": 40,
  "1": 90,
  "0": 3,
  "2": 44,
  x: 8,
  "-1": 30,
  "-5": 40
};

for (const key in obj) {
  console.log(key + " : " + obj[key]);
}

// 결과
0 : 3
1 : 90
2 : 44
b : 6
a : 5
-100 : 40
x : 8
-1 : 30
-5 : 40
```



#### 순회시 정렬순서 

예전에는 Object 의 for in 을 돌면 랜덤하게 출력되었고 브라우저마다 달랐다.

순서가 없는 HashMap 구조였던 것이다.

하지만 es6 부터는 키의 정렬 순서라는 것이 생겼다.  정렬 순서는 다음과 같다. 

- 숫자로 변경될수 있는 키 : 오름차순으로 정렬
- 문자 : 기술한 순서대로 정렬
- 심볼



### * ES6 에서의 객체 내부 함수 표기법

함수 내애 콜론을 쓰지 않고 표현이 가능하다.

```javascript
const objOld = {
    myFunc : function(){
        
    }
}

const objNew = {
    myFunc(){
        
    }
}
```



### 4) 객체관련 연산자 및 메소드



#### instanceof

- typeof가 원시타입을 체크한다면, instanceof는 참조타입을 체크한다. 
- typeof : string을 반환
- instanceof : boolean 을 반환



##### hasOwnProperty

- 해당 키가 존재하는지확인한다.



##### Object.values

- 객체에서 값만 모아서 배열로 반환



##### Object.assign

- 객체의 얕은 복사본을 반환



##### JSON.parse(JSON.stringify(obj))

- 객체의 깊은 복사본을 반환
- 해당 객체 안에 함수나 특별한 객체가 없고, JSON과 같은 순수한 데이터로만 되어있다면, 객체 객체를 복사하는 가장 빠르고 확실한 명령이 이 방법이다. 이 방법은 완전하게 세탁된 복사본을 돌려준다.
- stringify 와 parsing은 C가 수행하므로, 깊은 복사보다 훨씬 빠르다. 





## 4. 내장객체 

내장객체의 경우, 첫글자가 대문자이면 생성자로 사용가능하다. 

### 1) window 객체 

- document : JavasScript 언어와 HTML 언어 간의 통역사의 기능을 한다. 
- alert  : 원래의 정체는 window.alert이다. 
- console.dir() : 객체 형식으로 출력하기 
- console.dir(document)



### 2) Math.random

완벽한 랜덤은 아니다??



### 3) String(숫자) 

숫자를 문자로 바꿔줌