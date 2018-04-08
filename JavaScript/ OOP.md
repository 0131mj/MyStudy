# 객체지향 자바스크립트



## 객체 생성자

자바스크립트에서는 다른 언어와 다르게 클래스가 존재하지 않는다. 

대신, 자바스크립트에서는 함수를 사용하여 객체를 생성한다. 

객체를 생성하는 데 사용하는 함수를 특별히 생성자(constructor)함수라고 부른다. 



## 객체의 정의 및 생성

자바스크립트에서 객체를 만들어 내기 위해 사용하는 방법은 3가지가 있다. 

1. new와 Object 생성자 이용 - new Object()
2. 객체 리터럴 이용 - {}
3. new와 사용자 정의 생성자 이용 - new Person()



## 자바스크립트 내장 생성자

앞의 방법 중 1번 Object 생성자는 자바스크립트에서 기본적으로 제공해주는 생성자다. Object 외에도 자바스크립트에서 기본적으로 제공해주는 생성자는 많다.

String, Number, Boolean, Array, Date, Function, Object, RegExp, Math ...

요런 애들을 생성자라고 부르는 대신 '내장 객체' 혹은 '내장 타입'이라고 부르기도 한다. 



내장객체라고 특별할 것은 없으며 자바스크립트 엔진은 다음과 유사하게 정의된 함수를 기본적으로 메모리에 저장한다고 보면 된다. 내장 생성자도 함수 모델을 그대로 따른다. 

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



## 함수와 클래스의 차이점

함수가 객체를 생성하는 역할을 하지만 그렇다고 클래스와 동일한 개념은 아니다. 

- 클래스 : 객체 구조가 고정적이다. 컴파일 단계에서 에러가 발생한다.
- 함수 : 타입체크를 하지 않는다. 객체를 생성한 후에 객체의 멤버를 추가, 제거, 대체하면서 구조를 런타임에 변경해서 최종적으로 원하는 객체의 구조를 만들어낼 수 있다. 런타임 단계에서 에러가 발생한다. 





## 객체의 정의 방법 1. new Object

```javascript
var mySon = new Object();

mySon.Name = "달봉이";
```

객체를 new를 사용해서 생성했다. 이처럼 new와 함께 사용되어 새로운 객체를 만드는 함수를 생성자(constructor)라고 한다. 



## 객체 정의 방법 2. 객체 리터럴

```javascript
var mySon ={
    Name : "달봉이",
    Age : 7,
    IncreaseAge = function(i){this.Age + i};
}
```

리터럴은 풀어서 직접기재하여 객체를 정의하는 방식이다. 코드가 간결하고 가독성이 높아서 객체 생성구문으로 많이 사용된다. 

객체 리터럴을 사용해 객체를 생성하는 방법은 내부적으로 new Object를 수행한 후 멤버를 구성하는 방법과 동일한 절차를 따른다. 또한 이렇게 정의된 멤버는 모두 외부에서 접근할 수 있는 공개 멤버이다. 



## 객체 정의 방법 3. 사용자 객체정의

일반 객체지향 언어에서 클래스를 사용해 객체를 생성하는 방법과 가장 유사한 방법이다. 다음은 자바에서 Person이라는 클래스를 정의하고 객체를 생성하는 방법이다. 

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



### 객체 정의

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



### 객체 생성

앞에서 정의한 Person 생성자를 new 키워드와 함께 호출하면 객체를 생성할 수 있다.  

```javascript
var mySon = new Person("달봉이");
var mySon = new Person(); //생성자 매개변수 name은 undefined로 설정됨
var mySon = new Person; //생성자 매개변수 name은 undefined로 설정됨
```

생성자를 new와 사용할 때는 세번째 구문처럼 ()연산자를 생략해도 된다. 인자없이 인스턴스를생성하면 매개변수는 undefined로 설정된다. 

this로 정의된 멤버는 new로 생성되는 인스턴스 별로 존재한다. 이 인스턴스 멤버는 프로토타입 멤버와 대비되는 개념으로, 해당 객체에만 영향을 준다. 