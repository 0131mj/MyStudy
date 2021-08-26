# constructor 생성자

- 생성자 함수(줄여서 생성자)는, 타입이 아니라  객체를 생성하는 역할을 하는 함수이다. 
- 기존 함수에 new 연산자를 붙여서 호출하면, 해당 함수는 생성자로 동작한다.



빌트인 객체를 생성자함수로 사용할 수 있다. 

- Object 는 객체를 만드는 생성자
- Function 은 함수를 만드는 생성자



## constructor 의 정의 요령

```javascript
const Task = class {
    constructor(title){
        this.title = title;
        this.isComplete = false;
    }
}
```

위의 예제에서, this.isComplete의 내용을 강제하고 싶다면, 참조형을 사용하면 된다. 일반 값은 가용범위가 매우 넓은 반면, 버그를 낼 확률이 높다. 



## constructor 의 활용

1. 어느 객체를 가지고 만들었는지 알 수 있다. 

```javascript
const d = new Date();
console.log(d.constuctor);
```



2. 새로운 객체를 만들어내는 데도 사용할 수 있다. (사실 이는 두가지 함수가 축약되어 붙어있는 것이다.)

```javascript
const d2 = new d.constructor();
```





## 생성자 함수의 동작방식

함수에 new를 붙여서 생성자 함수로 호출하면, 다음과 같은 순서로 실행이 된다. 

1. 빈 객체를 생성하고 this가 이 빈 객체를 가리킬 수 있도록 준비한다. 
2. this를 통해 동적으로 프로퍼티를 할당한다. 
3. 리턴값이 없다면, 최종적으로 this를 리턴하고, 리턴값을 명시적으로 정해주면 정해진 객체가 리턴된다. 
   (생성자 함수가 아닌 일반함수에서는 리턴값이 없을 경우, undefined를 리턴한다.)



## new의 역할

객체를 리터럴로 생성하는 대신에, new를 통해서 생성을 하면  prototype 체이닝이 기능을 한다. 

아래의 둘은 각각 내장함수 Object() 와 Fuction 으로 만들어 진 것이다. 

```javascript
const a = new Function(); // a.__proto__ === f();
const b = new Object();   // b.__proto__ === Object;
```



new Number() 는 Number.prototype.constructor 를 사용하여 인스턴스를 생성해낸다.