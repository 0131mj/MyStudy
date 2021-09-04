# 내장객체 (Built-in)



## prototype

- 내장객체에 .prototype 프로퍼티가 있으면 인스턴스를 생성할 수 있다. 
- 즉, prototype은 인스턴스 생성가능 여부의 기준이 된다. 
- 예를 들어 Math Object의 경우, prototype이 존재하지 않으므로 인스턴스를 만들어낼 수 없다.



## function vs method

MDN에서 문서를 검색하다보면 어떤 함수는 Object.defineProperty() 이런 형태로 되어있고 또 어떤 건 Object.prototype.valueOf() 처럼 prototype을 한번 거치고 있는 게 있다. 여기서는 앞의 것을 function, 뒤의 것을 method 라고 구분지어 설명한다.

### function

- 연결 : Object.create() 와 같이 오브젝트에 바로 연결되어 있다.
- 호출: Object.create() 처럼 바로 호출한다. 
- 작성: 파라미터에 값을 작성한다.

### method

- 연결: Object.prototye.toString() 와 같이 prototype에 연결되어 있다. 
- 호출: Object.prototype.toString() 처럼 호출하거나 인스턴스를 생성하여 호출한다.
- 작성: method 앞에 값을 작성한다. 

```javascript
const num = 123;
console.log(num.toString()); //"123"
```

데이터타입에 따라 Number 인스턴스를 생성한 뒤, prototype에 포함된Number.prototype.toString()을 호출한다.



### 공통 메소드

모든 Built-in Object의 `__proto__`에는 Object.prototype의 6개 메소드가 설정되어 있다. 

- constructor 
- hasOwnProperty
- propertyIsEnumerable
- toLocaleString
- toString
- valueOf
- isPrototypeOf



#### toString()

Object의 toString은 인스턴스의 타입을 문자열로 표시한다. 

```javascript
const obj = {};
console.log(obj.toString()); // [object Object]

const date = new Date();
console.log(Object.prototype.toString.call(num)) // [object Date]
```

앞의 object는 인스턴스를, 뒤의 결과는 빌트인 Object를 나타낸다.



## Built - in 오브젝트의 종류

- Number
- String
- Boolean
- Object
- Array
- Function
- Math
- Date
- JSON
- RegExp
- Global
- Argument



### String

- String(숫자) : 숫자를 문자로 바꿔줌



### Number

- Number Object의 스펙을 확인하려면, 아래와 같이 테스트해보면 된다. 

```javascript
console.dir(Number)
```

그러면 isNaN, MIN_VALUE 등 내장된 함수와 값이 나온다.



### Math

- Math.random : 완벽한 랜덤은 아니다??



### window

- document : JavasScript 언어와 HTML 언어 간의 통역사의 기능을 한다. 
- alert  : 원래의 정체는 window.alert이다. 
- console.dir() : 객체 형식으로 출력하기 
- console.dir(document)



### 



