# 변수 스코프

스코프란, "변수의 유효 범위"를 뜻한다. 

자바스크립트의 변수 스코프를 이해하기 위해서는 자바스크립트가 실행되는 과정에 대해서 알아볼 필요가 있는데,

출처마다 조금씩 설명이 다르다. 



## 객체지향 자바스크립트



자바스크립트는 아래의 순서대로 실행된다. 

1. 파싱 Parsing
2. 변수, 함수 정의
3. 실행
   1. 함수코드 파싱
   2. 호출




### 1. 파싱 Parsing

우선 전역레벨의 파싱이 먼저 일어난다. 

파싱은 변수와 함수변수를 초기화하는 과정이다.

전역레벨 -> 함수레벨



### 2. 변수, 함수 정의 



---



## You don't know JS - 카일 심슨




## 컴파일

자바스크립트가 컴파일의 과정이 없다고 생각하기 쉬운데, 자바스크립트에는 아주 짧은 컴파일 과정이 존재한다. 

단지 '미리' 컴파일을 해놓지 않고 코드가 실행되기 바로 직전에 컴파일이 실행된다. 



자바스크립트의 컴파일은 3가지 단계로 진행된다.

1. 토크나이징/렉싱 : 문자열을 쪼갬
2. 파싱 : 쪼갠 문자열을 AST 형태로 변환
3. 코드 생성 : AST를 실행코드로 변환


---



### 1. 토크나이징

### 2. 파싱 Parsing AST 

```javascript
var a = 2;
```

이걸 실행했을때, AST가 어떻게 그려지는가는 아래 사이트를 보면 된다.

https://resources.jointjs.com/demos/javascript-ast

http://int3.github.io/metajs/

http://www.pythontutor.com/visualize.html#mode=edit



### 3. 코드 생성 



---



## 내가 정리한 결론



### 자바스크립트 실행과정 : 선 컴파일, 후 실행

자바스크립트는 실행되기 바로 직전에 컴파일을 먼저 하는데, 적절할 지는 모르겠지만 아래와 같이 비유를 해볼 수 있다. 

- 컴파일 : 접시를 준비하는 것(셋팅)

- 실행 : 접시위에 음식을 옮겨담는 것

순서상으로 볼 때, 자바스크립트 엔진은 컴파일을 다 하고 나서 실행을 한다. 즉, 접시 하나를 준비해서 음식을 담고, 또 다음 접시를 하나 더 꺼내서 다음 음식을 담는 방식이 아니라, 처음부터 접시를 다 깔아놓은 다음(컴파일)에 음식을 올린다(실행)는 말이다. 



#### 1. 선 컴파일 : 키워드를 만나면 정의를 한다.

그렇다면 자바스크립트는 어떻게 컴파일이 되는가? 변수 var test와 함수 function func에는 한가지 공통점이 있는데 식별자 앞에 var와 func 같은 키워드가 붙어있는 것이다. 이 var와 func의 역할은 '내가 변수요', '내가 함수요'라고 알려주기 위한 것으로,  컴파일 과정에서는 키워드를 만났을 때 이 키워드를 참고로 변수 및 함수를 정의한다.   

var 변수의 값은 undefined로 초기화된다. 

그러니까 var a, function func라는 두 개의 접시를 미리 준비하는 것이다.

| keyword  | identifier |
| -------- | ---------- |
| var      | a          |
| function | test       |

- var 없이 변수를 선언하면 컴파일 단계가 아니라, 실행 단계(런타임)에 전역변수 스코프가 정의된다. 



#### 2. 후 실행





#####  정리

1. 프로그램은 실행 전에 컴파일을 한다. 
2. 컴파일 이후에 실행된다.
3. 키워드들은 초기화되어버린다.


---





## 변수 스코프

변수 스코프 자체는 추상적인 개념이 아니라 하나의 객체이다. 

변수 스코프는 아래와 같은 구성으로 되어 있다. 



### 자바스크립트 스코프 객체의 구성

- arguments : 실제 호출에 사용되는 인수
- parameter : 함수에서 정의하는 매개변수
- 내부 변수




```javascript
function add(x, y){
    var a = x + y;
    return a;
}

add(1,2,3);
```

- "arguments" : [1, 2, 3]
- "x" : 1
- "y" : 2
- "a" : undefined;



## 자바스크립트 스코프의 특징

자바스크립트의 변수스코프는 3가지 특징을 갖고 있다. 

1. 함수 단위의 변수관리

2. 실행시의 변수 검색은 렉시컬 영역을 기준으로 한다. 

3. 실행시의 변수 검색은 변수 스코프체인을 이용한다. 

   ​




#### 1. 함수단위 스코프

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





#### 2. let, const의 스코프

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





#### 3. 렉시컬 스코프

스코프는 설정하는 방식에 따라 두가지 방식으로 나눌 수 있다.

- 렉시컬 스코프 : 실행환경이 아닌 '정의'환경으로 함수의 스코프 설정
- 다이나믹 스코프 : '실행'환경으로 스코프 설정

자바스크립트는 렉시컬 특성으로 스코프를 설정한다. eval, with 같은 방법으로 렉시컬 스코프를 수정할 수는 있지만, 위험해서 다들 쓰지 말라고 그러니까 몰라도 된다. 





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