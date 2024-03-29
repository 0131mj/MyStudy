# 클래스

클래스는 일종의 특수한 함수이다. 



## 함수와 클래스의 차이점

함수가 객체를 생성하는 역할을 하지만 그렇다고 클래스와 동일한 개념은 아니다. 

- 클래스 : 객체 구조가 고정적이다. 컴파일 단계에서 에러가 발생한다.
- 함수 : 타입체크를 하지 않는다. 객체를 생성한 후에 객체의 멤버를 추가, 제거, 대체하면서 구조를 런타임에 변경해서 최종적으로 원하는 객체의 구조를 만들어낼 수 있다. 런타임 단계에서 에러가 발생한다. 



## 빌트인 객체의 상속

- 단순히 Prototype의 편의문법이 아니다. 
- Array 같은 내장객체를 상속받아서 하나의 클래스로 만드는 것이 가능하다.

```javascript
const Data = class extends Array{
    
}
```





ES5 이전의 문법에서는 class란 단지 개념적인 것에 불과했다. 

이를 표시하기 위한 시맨틱으로, 함수 이름을 대문자로 만들면 생성자로 사용하겠다라는 선언으로 간주하고, 프로토타입에 함수를 연결하는 방식이었다. 

이렇게 만들어진 함수는 new 키워드를 사용하여 새로운 인스턴스를 만들 수 있었고, 이를 생성자 함수 라고 불렀다. 



하지만 ES6에서는 실체화된 class 가 등장했다. 



### 클래스와 프로토타입

```javascript
// ES5 문법
function Person(){
    
}
Person.prototype.myFunc = function (){
    
}

// ES6 문법
class Person{
    constructor(){
        
    }
    
    // myFunc를 정의하면 메소드는 자동으로 Person.prototype 에 저장된다. 
    myFunc(){
        
    }
}
```



## super

함수로 사용시 : 부모클래스의 생성자를 호출한다.

객체로 사용시 : 부모클래스의 메소드를 호출한다.



#### ES6 이후 : 클래스 문법 (super 키워드 사용)

```javascript
class Person {
    constructor(name, first, second){
    	this.name = name;
		this.first = first;
		this.second = second;    
    }
}

class PersonPlus extends Person{
	constructor(name, first, second, third){
        super(name, first, second);
        this.third = third
    }  
}
```



#### ES5 이전 : 함수 문법(call 키워드 사용)

```javascript
function Person {
	this.name = name;
	this.first = first;
	this.second = second;    
}

function PersonPlus(name, first, second, third){
    Person.call(this, name, first, second)
    this.third = third
}
```

