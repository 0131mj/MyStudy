# Function

Function 은 Built-in Object 의 일종으로서 아래와 같은 프로퍼티를 가진다. 



##### 값

- length: 파라미터 수: JS엔진에 의해 함수 생성시 자동으로 설정됨

##### 함수

- new Function() : 문자열을 받아서 Function 인스턴스를 생성, 마지막 파라미터만 함수 문자열이고 나머지 앞의 것들은 인자들의 이름을 정의한다.
- Function()

##### 메서드

- constructor
- call() : 함수 호출
- apply()
- toString() : 함수를 문자열로 반환
- bind() : 새 오브젝트를 만들어서 함수 실행



모든 Built-in 생성자함수의 constructor

모든 객체의 근본 생성자

```javascript
[Math, Array, Date, Number, Function, Symbol, Object].forEach((item)=>{
    console.log(item.constructor)
})

// f Object() { [native code]}
// f Function() { [native code]}
// f Function() { [native code]}
// f Function() { [native code]}
// f Function() { [native code]}
// f Function() { [native code]}
// f Function() { [native code]}
```

하지만 Objec의 인스턴스이기도 하다. 

> **`instanceof` 연산자**는 생성자의 `prototype` 속성이 객체의 프로토타입 체인 어딘가 존재하는지 판별합니다. - MDN