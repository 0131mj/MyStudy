# Data Type



## 1. 자료형에 따른 언어의 종류

프로그래밍 언어는, 자료형을 어떻게 취급하느냐에 따라 두 종류로 나눌 수 있다. 

자바스크립트는 약한 데이터타입 체크 언어에 속한다. 

|                           | **강한 데이터타입 체크 언어** <br />(strongly typed language) | **약한 데이터타입 체크 언어**<br /> (weakly typed language)  |
| ------------------------- | ------------------------------------------------------------ | :----------------------------------------------------------- |
| 대표적인 언어             | Java, C...                                                   | JavaScript, PHP...                                           |
| 변수 타입이 결정되는 단계 | 컴파일 단계                                                  | 런타임 단계                                                  |
| 타입 표기                 | 변수 선언시에(컴파일 되기 전에) <br />타입을 명시해줘야 함.  | 타입을 명시하지 않음 - <br />자바스크립트의 경우 var(ES6: let, const)만 사용함. |
| 변수가 받아들이는 자료형  | 명시한 데이터타입과 일치해야 함                              | 어떤 데이터든 들어올 수 있음                                 |





## 2. EcmaScript 타입분류: 언어타입(Language types)과 사양 타입 (Specification types)

EcmaScript 에서는 타입을 두 가지 하위분류로 나눈다. 



### 1) 언어타입

ECMAScript 프로그래머가 언어를 사용하여 직접 조작하기 위한 타입

- Undefined
- Null
- Boolean
- String
- Number,
- Object

위의 언어타입들은 다시 두 종류로 나눌 수 있다. 
- 값과 참조를 정의하는 방식은 언어마다 다르다. 
- 값이 아니면 모두 참조이다. 

#### (1) Primative(값)

```js
var string = '문자열'; // '5'도 문자열임.
var number = 5;  	  // 숫자 (계산 가능)
var boolean = true;   // 참 or 거짓
var nullType = null;  // 비어 있음.
var undefined;        // 정의되지 않음
```

- 기본타입(5종) : string, number, boolean, null, undefined
- typeof 연산자를 사용해 자료형을 확인한다. (typeof 연산자와 같은 것를 keyword 라고 부르기도 한다. )
- 복사하면 값 자체가 복사된다. 
- 함수인자로 값이 전달되면 복사되어서 넘어간다. 



##### (2) Reference(참조)

```javascript
var func = function();
var array = [];
var rx = new RegExp();
```

- 참조타입-객체(3종) : Function, Array, RegExp
- instanceof 연산자를 사용해 참조형태를 확인한다. 
- 복사하면 힙주소가 복사된다. 


###### 가비지 컬렉션

- 참조타입은 메모리의 주소가 복사된다. 아래의 코드에서 볼 수 있듯, b에는 a의 주소가 그대로 들어간다. 
-  동일한 주소를 바라보고 있으므로, b를 변화시키면 a도 변화한다. 

```javascript
var a = [1, 2, 3];
var b = a;
b.push(4);

console.log(a); // [1, 2, 3, 4]
console.log(b); // [1, 2, 3, 4]
```



- 하지만 이 경우에는 완전히 다르게 동작한다. b 가 참조할 주소가 없어지면, b는 가비지 콜렉터의 대상이 된다. 

```javascript
var a = [1, 2, 3];
var b = a;
b = null;

console.log(a); // [1, 2, 3]
console.log(b); // null
```

---




### 2) 사양 타입 (스펙타입 or 명세타입)

사양 타입은 ECMAScript 언어 구조 및 ECMAScript 언어 유형의 의미를 설명하기 위해 알고리즘 내에서 사용되는 메타 값으로, 

ECMAScript 표현식 평가의 중간 결과를 설명하는 데 사용할 수 있지만 이러한 값은 객체의 속성이나 ECMAScript 언어 변수의 값으로 저장할 수 없다.

- Reference

- List

- Completion
- Property Descriptor 
- Environment Record
- Abstract Closure
- Data Block


https://tc39.es/ecma262/#sec-ecmascript-language-types

---


