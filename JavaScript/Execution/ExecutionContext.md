# 실행 컨텍스트

```javascript
function a(){
	console.log('a');    
}

function b(){
    console.log('b');
    a();
    console.log('b2');
}

b();


/* 출력결과
	b
	a
	b2
*/
```

코드는 총 세 부분으로 되어 있는데 function a, function b가 있고 마지막으로 실행구문 b();가 있다.  

코드 실행이 시작되면, 자바스크립트 엔진은 한줄씩 코드를 읽어내려가기 시작하는데, 

1. 첫 줄에서 function a가 선언되어 있는 걸 보고서도, 이건 그냥 선언만 된 것이기 때문에 자바스크립트 엔진은 '아 그래?' 하고 쓩 지나간다. 
2. function b 도 마찬가지로 쓩 하고 한번 더 지나간다. 
3. 마침내 b(); 를 만나면 '아 날보고 뭘 실행하라구나' 라는 걸 알고 그제서야 b를 찾는다. 
4. b를 찾아서 실행을 시작하는데 b코드블럭 내부에서 시키는 대로 콘솔에 'b'를 찍어주고 나니, 다음 줄에선 a를 실행하란다. 
5. 그래서 또 a를 찾으러 가서 이번엔 a에서 시키는대로 콘솔에 'a'를 출력한다. 
6. 그걸 다하고 다시.... b가 시키는대로 돌아와서 'b2'도 콘솔에 찍어주고나면 그제서야 비로소 b를 실행하라는 명령에 대한 소임이 끝나는 것이다. 

(당연한 얘기지만) 255줄짜리 코드가 주어졌을 때 자바스크립트 엔진은 1번줄부터 255번줄까지 코드를 한줄한줄 순서대로 실행하지 않는다.

 'b'라는 함수가 호출되면 함수의 영역으로 이동해서 함수를 실행하고, 그 b함수를 실행하다가도 또 안에서 a라는 다른 함수가 나오면 a함수를 실행하는 식으로 일이 진행된다. 



## 실행 컨텍스트의 개념

보다 정돈된 표현으로 정의해보면 실행 컨텍스트란, 다음과 같다. 

- 실행 가능한 코드를 형상화 하고 구분하는 추상적인 개념
- 실행 가능한 자바스크립트 코드 블록이 실행되는 환경
- 현재 실행되는 컨텍스트에서 이 컨텍스트와 관련없는 실행코드가 실행되면, 새로운 컨텍스트가 생성되어 스택에 들어가고 제어권이 그 컨텍스트로 이동한다. 
- 함수가 호출되었을 때, 함수가 실행되는 환경, 함수가 실행되었을 때 결과를 저장하는 영역

실행 컨텍스트에서는 a컨텍스트에서 b컨텍스트로 '이동' 한다기보단 한줄 한줄 '쌓이는' 스택 개념으로 본다. 

쌓이긴 뭐가 쌓이냐고?  "아까 시켜놓은게 다 끝나지 않았으니, 새로 들어온 이거 먼저 처리하고 쌓인 거 나중에 처리할께" 라는 개념으로 보면 된다. 이렇게 컨텍스트가 쌓이고 치워지는 변화를 '제어권'이 이동한다고 표현한다. 



## Execution Context (실행 컨텍스트)의 생성과 소멸

자바스크립트 엔진은 Executable Code(실행 가능한 코드)를 만나면 Execution Context 를 생성한다. (모던 자바스크립트 입문)

Executable Code 란 다음과 같다.  다시 말해 자바스크립트에서 실행 컨텍스트가 새롭게 쌓이는 경우는 다음 3가지 경우다.

1. GEC : 처음 코드 실행 (전역 레벨)
2. FEC: 함수 안의 코드 실행
3. EC: eval() 함수로 코드 실행


컨텍스트가 새로 들어오면 새 컨텍스트를 기존 컨텍스트 위에 하나하나씩 차곡차곡 쌓는데, 맨 위에 쌓인 컨텍스트부터 하나씩 없애나가는 방식으로 일을 처리한다. 이걸 'LIFO 방식의 스택 구조'를 지닌다고 한다.



## 실행 컨텍스트의 구조 (ES6 기준)

각 함수는 선언될 때, [[Scope]]에 자신의 스코프(함수가 속한 레벨 범위의 정보들)를 기록하고, 이 스코프를 기반으로 함수가 실행되기 직전에 실행 컨텍스트를 생성한다. 실행 컨텍스트는 자신의 함수 내부에서 실행될 다양한 케이스에 대한 만반의 준비를 해두는 것이다. 함수가 선언된, 기술된 형테에서 스코프가 이미 결정되어버렸고, Lexical(:어휘적인) 방식으로 컨텍스트를 형성하게 된다. 그리고 이런 렉시컬 환경은 내부 => 외부 => 전역 으로 이동하면서 변수탐색이 가능하도록 한다.

- EC (Execution Context)
  - **LEC (Lexical Environment Component)** (== Variable Environment Component) : ES5에서 도입
     - ER (Environment Record)
        - DER (Declarative Environment Record)
        - OER (Object Environment Record)
    - OLER (Outer Lexical Environment Reference)
  - **TBC (this Binding Component)**



### LE (Lexical Environment Component) (== Variable Environment Component)

자바스크립트 엔진은 해당 자바스크립트 코드의 유효범위 내에 있는 식별자와 그 식별자가 가리키는 값을 키 밸류 형태로 렉시컬 환경 컴포넌트에 기록한다.

렉시컬 환경 컴포넌트는 ER과 OLER로 구성된다. 



#### ER (Environment Record) : 환경 레코드

렉시컬 환경 안의 식별자와 그 식별자가 가리키는 값의 묶음이 실제로 저장되는 영역



##### DER (Declarative Environment Record)  :  선언적 환경 레코드

실제 함수, 변수, catch문의 식별자와 실행 결과가 저장되는 영역

함수 코드 실행 도중에 변수들이 저장된 곳을 만나면, 프로퍼티 형태로 선언적 환경 레코드에 기록한다. 



##### OER (Object Environment Record)  :  오브젝트 환경 레코드

실제 함수, 변수, catch문의 식별자와 실행 결과가 저장되는 영역



#### OLER (Outer Lexical Environment Reference) : 외부 렉시컬 환경 참조

외부 렉시컬 환경 참조는, 함수 바깥에 있는 값들을 내 값처럼 사용하기 위한 준비라고 할 수 있다. 
함수가 실행될때 제어권리에서 빠져나가지 않고 바로 참조할 수 있는 명세를 기록해두는 것이다.



### TBC (this Binding Component)



해당 함수를 호출한 객체의 참조가 저장되는 영역



참고 출처 : 모던 자바스크립트 입문 책





#### Lexical Environment

1. 자바스크립트 엔진은 function 키워드를 만났을 때 함수 밖의 Scope가 결정되며 해당 Function Object의 [[Scope]] 에 이를 기록해둔다. 
   이때 결정된 스코프를 LexicalEnvironment라고 부른다.
2. 이후 함수가 호출 되면, 해당 Function Object의 [[Scope]]를 Execution Context 의 OuterLexicalEnviront Refenence에 설정한다.

(인프런, 자바스크립트 중고급 강의 6.Lexical Environment)





## 실행 컨텍스트의 구조 (ES3 기준 - Legacy)

실행컨텍스트가 어떻게 구성되어 있는지에 대한 설명이 조금씩 다르다. 



#### [포이마웹](http://poiemaweb.com/js-execution-context)에서의 설명 

실행컨텍스트 안에 변수객체와 스코프체인, this 가 들어있다

실행 컨텍스트가 단지 추상적인 개념에 머무는 것이 아니라 물리적으로 객체의 형태를 지니고 있다는 관점으로 설명함.

- 실행 컨텍스트
  - 변수객체
  - 스코프체인
  - this



#### 인사이드 자바스크립트에서의 설명

변수 객체 안에 스코프체인과 this가 들어있다고 설명해놓았다. 

제어권의 이동이라는 추상적인 개념으로 실행 컨텍스트를 보고 있으며 이를 변수객체의 변화로 설명하고 있는 듯 하다. 

- 변수객체
  - 스코프체인
  - this



##### 실행 컨텍스트 수행순서

자바스크립트의 실행 컨텍스트는 아래의 순서대로 수행된다.

1. 활성객체 생성 : 엔진 내부에서 접근가능. (사용자 접근 불가)
2. arguments 객체 생성
3. 스코프 정보 생성
4. 변수 생성
5. this 바인딩
6. 코드 실행




###### 1. 활성객체 생성

- 활성객체(변수객체)는 객체 형태의 껍데기다.  여기에 컨텍스트에서 실행에 필요한 정보들(매개변수와 사용자정의 변수)이 담긴다.


###### 2. arguments객체 생성

- arguments 프로퍼티로 arguments객체를 참조한다. 



###### 3. 스코프 정보 생성

- 컨텍스트의 유효 범위를 나타낸다.
- 연결리스트와 유사한 형식이다.


###### 4. 변수 생성

- 표현식의 실행은 변수 객체 생성이 다 이루어진 후에 시작된다. 

###### 5. this 바인딩

- this가 참조하는 객체가 없는 경우, 전역객체를 참조한다. 





---

##### 참고링크

여기보다 아래에 설명을 잘해놓은 곳이 있으니 참조하자.

http://huns.me/development/159

http://poiemaweb.com/js-execution-context

http://heeestorys.tistory.com/708?category=693723

https://muckycode.blogspot.kr/2015/03/javascript-execution-context-scope.html

http://alnova2.tistory.com/967

http://jinbroing.tistory.com/78

http://hsp1116.tistory.com/22

https://medium.com/@happymishra66/execution-context-in-javascript-319dd72e8e2c