# new



new는 constuctor(생성자 함수)를 사용하여 인스턴스를 생성하는 오퍼레이터이다. 

new 로 생성할 수 있는 인스턴스의 타입은 두 종류가 있다.

- 내장 객체 타입
- 사용자 정의 객체 타입



그리고 사용자 정의 객체 타입으로  1회성 인스턴스를 만들어 낼 수도 있다. 

정리하자면, new 뒤에 붙을 수 있는 건 총 3가지가 된다.

```javascript
new Obj(); //사용자 정의 객체의 인스턴스 생성
new Number(1); // 빌트인 객체의 인스턴스 생성
const a = new function(){ // 1회성 인스턴스
    this.a = 1;
}
```



## new의 역할

객체 인스턴스를 리터럴로 생성하는 대신에, new를 통해서 생성을 하면  prototype 체이닝이 기능을 한다. 

아래의 둘은 각각 내장함수 Object() 와 Fuction 으로 만들어 진 것이다. 

```javascript
const a = new Function(); // a.__proto__ === f();
const b = new Object();   // b.__proto__ === Object;
```



new Number() 는 Number.prototype.constructor 를 사용하여 인스턴스를 생성해낸다.



## 빌트인 오브젝트로 인스턴스 생성하기



Array 라는 빌트인 오브젝트가 있다.

```javascript
const isArray = Array.isArray(1); //(1)빌트인 오브젝트 기능으로 사용
const arr = new Array("abc"); // (1)생성자로 사용
```

(1) Array : 빌트인 오브젝트의 고유 기능 사용 : 1이라는 값이 배열인지 아닌지를 boolean 형태로 출력하는 기능을 수행

(2) Array : 생성자로 사용



새로 만들어진 arr에는 (1)의 Array와 달리, isArray같은 함수가 들어있지 않다. 

arr.isArray(); 이런식의 문법을 사용하면, "그런 함수 없다" 라고 에러가 난다. 

하지만 arr.push("a") 은 작동한다. 

그렴 (1) 과 (2)는 다른 Array 일까? 그렇지 않다. 



new 라는 연산자를 사용해서 인스턴스를 생성하게 되면

Array 빌트인 오브젝트의 고유기능을 뺀 prototype만 참조하도록  '사용할 함수는 여기로 와서 써라.' 라고 



필요한 Primative 값만 할당해주고 마는 것이다.

인스턴스를 생성하게 되면, 인스턴스를 생성하는 constructor의 prototype만 복사해서 인스턴스에 할당해준다.



#### Array 빌트인 오브젝트의 모습

```javascript
Array = {
    isArray: f(), // 빌트인 고유기능
    prototype: {  // 프로토타입 원본 
        push: f(),
        pop: f(),
    }    
}
```



#### arr 인스턴스의 모습 

```javascript
arr = {
    O: "abc", // 인스턴스 고유의 값
    length: 2, // 인스턴스 고유의 값
    [[Prototype]]: { // Array의 prototype 프로토타입 상속
        push: f(),
        pop: f(),
    }    
}
```

여기서, 대괄호가 두개 붙는 문법은 자바스크립트 엔진에 의해 만들어졌다는 표기이다.



##### Array에 프로퍼티 추가하기

```javascript
Array.origin = "origin"; // Array 빌트인 오브젝트 안에만 들어있음.
Array.prototype.all = "all"; // 모든 Array 인스턴스에서 사용가능
```







클래스

----

참고 : https://ko.javascript.info/constructor-new