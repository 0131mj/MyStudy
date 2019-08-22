# Object 객체

객체와 함수는 자바스크립트에서 가장 중요한 개념이다. 

- 객체
  - 함수
  - 배열
- 숫자
- 문자
- 불린
- null
- undefined



## 내장객체 

내장객체의 경우, 첫글자가 대문자이면 생성자로 사용가능하다. 

### window 객체 

- document : JavasScript 언어와 HTML 언어 간의 통역사의 기능을 한다. 
- alert  : 원래의 정체는 window.alert이다. 
- console.dir() : 객체 형식으로 출력하기 
- console.dir(document)



### Math.random

완벽한 랜덤은 아니다??



### String(숫자) 

숫자를 문자로 바꿔줌





## ES6 객체 순회 : 반복하여 나타내는 방법

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



## ES6 객체 생성 

```javascript
let i = 0;
const obj = {
    [i++]: 3,
    [i++]: 4,
}

console.log(obj); // {"0":3,"1":4}
```

- 위에서 부터 순서대로 만들어지므로, 예시와 같은 연산결과도 돌릴 수 있다. 



## ES6 에서의 객체 내부 함수 표기법

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



## 객체관련 연산자 및 메소드



### instanceOf

- typeOf가 원시타입을 체크한다면, instanceOf는 참조타입을 체크한다. 



### Object.values

- 객체에서 값만 모아서 배열로 반환



### hasOwnProperty

- 해당 키가 존재하는지확인한다.



### JSON.parse(JSON.stringify(obj))

- 객체를 복사하는 가장 빠르고 확실한 명령
- stringify 와 parsing은 C가 수행하므로, 깊은 복사보다 훨씬 빠르다. 