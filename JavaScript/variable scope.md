# 변수 스코프

스코프란, "변수의 유효 범위"를 뜻한다. 

자바스크립트에는 변수가 어디에 생성되고 살아가는지를 알아보자. 



## 컴파일

자바스크립트의 스코프를 이해하기 위해서는, 자바스크립트라는 언어 자체에 대한 이해가 필요하다. 

자바스크립트가 컴파일의 과정이 없다고 생각하기 쉬운데, 자바스크립트에는 아주 짧은 컴파일 과정이 존재한다. 

단지 '미리' 컴파일을 해놓지 않고 코드가 실행되기 바로 직전에 컴파일이 실행된다. 



자바스크립트의 컴파일은 3가지 단계로 진행된다.

1. 토크나이징/렉싱 : 문자열을 쪼갬
2. 파싱 : 쪼갠 문자열을 AST 형태로 변환
3. 코드 생성 : AST를 실행코드로 변환


---



## AST 

```javascript
var a = 2;
```

이걸 실행했을때, AST가 어떻게 그려지는가는 아래 사이트를 보면 된다.

https://resources.jointjs.com/demos/javascript-ast

http://int3.github.io/metajs/

http://www.pythontutor.com/visualize.html#mode=edit



자바스크립트에서의 변수 스코프의 특징은 크게 두가지 정도가 있다.

- 함수단위 스코프
- 렉시컬 스코프





## 함수단위 스코프

```javascript
function add(x,y){
    this.a = x;
    this.b = y;
    this.c = 'c';
    var d = 'd';
    e = 'e'
    return a + b;
}

add.m = 'm';
console.log(add(3,5)); //8
console.log(add.a); //undefined
console.log(add.c); //undefined
console.log(add.d); //undefined
console.log(add.e); //undefined
console.log(e); //e
console.log(add.m); //m
```

- 기본적으로 자바스크립트는 함수 단위로 스코프가 정해진다. 
- 자바스크립트 함수 내부에 정의된 변수는 지역변수로서, 외부에서 접근이 불가능하다. 
- 단, 유동적으로 추가한 변수(m)의 경우 외부에서 접근이 가능한데 이것은 변수가 다른 스코프에 저장이 되기 때문이다. 
- var를 빼고 선언한 변수는 글로벌 스코프를 가진다. (하지만 add.e와 같이 함수내부 형태로의 접근은 안된다.)





## let, const의 스코프

```javascript
function double(x){
    if(x !== null){
        var result = x * 2;
        console.log(result); 
    }
    console.log('result is ' + result);
}
double(3);  //6, result is 6

function double2(x){
    if(x !== null){
        const result = x * 2;
        console.log(result); 
    }
    console.log('result is ' + result);
}
double2(3); //6, Uncaught ReferenceError : result is not defined
```

- double() 함수를 보면 result라는 변수는 if문 안에 있다. 하지만 result는 if문 바깥에서도 호출이 가능한데, 
  그 이유는 <u>'함수 안에 작성된 변수의 범위는 그 함수 범위 전체'</u> 이기 때문이다.  
- 하지만 let이나 const를 사용할 경우, 변수의 스코프는 해당 블록까지만이다. 따라서 if문 밖을 벗어나서 result를 호출하면 에러를 출력한다. 





## 렉시컬 스코프

스코프는 설정하는 방식에 따라 두가지 방식으로 나눌 수 있다.

- 렉시컬 스코프 : 실행환경이 아닌 '정의'환경으로 함수의 스코프 설정
- 다이나믹 스코프 : '실행'환경으로 스코프 설정

자바스크립트는 렉시컬 특성으로 스코프를 설정한다. eval, with 같은 방법으로 렉시컬 스코프를 수정할 수는 있지만, 위험해서 다들 쓰지 말라고 그러니까 몰라도 된다. 



## 변수 스코프

변수 스코프 자체는 객체이다.

- 변수 스코프 객체의 구성

  - arguments : 실제 호출에 사용되는 인수
  - parameter : 함수에서 정의하는 매개변수
  - 내부 변수

  ​



### var 있고 없고의 차이

#### 있을 때

```javascript
var a = 'global'
function test(){
  alert(a); //undefined
  var a = 'local';
  alert(a);
}
test();
```

#### 없을 때

```javascript
var a = 'global'
function test(){
  alert(a); //global;
  a = 'local';
  alert(a);
}
test();
```

왜 이런일이 생기는가.