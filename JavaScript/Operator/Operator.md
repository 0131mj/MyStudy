# 연산자



## I. 연산자의 정의

연산자란 무엇인가? 

수학에서는 흔히 사칙연산에 사용하는 +, - 등을 연산자라고 한다. 

하지만 자바스크립트에서는 new, instanceof와 같은 키워드 또한 연산자로 취급한다. 

그 말은, 생각보다 연산자의 영역이 광범위 하다는 말이 된다. 그럼 연산자란 무엇이고, 어디서 어디까지가 연산자인가?



> "연산자란, 값에 대해서 어떤 작업을 컴퓨터에 지시하기 위한 기호" - by 생활코딩

말하자면 더하고 빼고 곱하는 수학적인 의미의 연산 만을 말하는 것이 아니라, 미리 정의되어 있는 명령어를 총칭한다고 보면된다. 

그래서 연산자는 이항연산자, 비트연산자, 대입연산자, 논리연산자 등의 여러 연산자들이 있는 것이다. '연산자'라는 단어보다 '실행자'라는 단어를 썼다면 더 어울렸을 지도 모른다.



### new?

new 도 연산자다. 연산자는 빼기나 더하기 같은걸 말하는 게 아닌가?

그러니까, 수학계산을 해주는 플러스 마이너스 같은게 연산자 아닌가?

적어도 논리연산자까지는 그렇다고 치고, 당최 instanceof 같은 게 왜 연산자인지 모르겠는데,

연산자의 범위가 어디까지이고 뭐가 연산자인지를 속시원하게 설명해놓은 게 잘 없다. 



### 전역 함수와 연산자의 차이

아래에 있는 애들은 함수가 아니라 연산자다.

- typeof
- instanceof
- delete
- new
- super
- void
- in
- …obj



얘네는 함수다.

- isNaN()
- isFinite()



그럼 무엇이 연산자이고 무엇이 함수일까?

function은 키워드일까? 예를 들어 요런 식이 있다고 하자. 

```javascript
var a = function(){}
```

여기서 function은 타입이 아니다. 자바스크립트에서는 타입를 저딴 식으로 갖다 붙이지 않는다. 

그럼 function이야말로 함수를 만들어주는 연산자가 아닐려나?



부호?도 연산자인가?

괄호, 콤마 같은 시시하지만(?) 자주 쓰이는 애들...



이것들은 키워드라고 부른다. 



이 질문에 대해 만족할만한 대답은, 아래에서 찾았다. 여기에 따르면,

https://cs.stackexchange.com/questions/6067/what-is-the-difference-between-operator-and-function



> Historically, my guess is that the difference is rooted in how things were (and still are) translated into machine code.
>
> An *operator* such as addition of integers or exclusive-or of booleans would be translated into one (or few) assembler commands which would be directly executed by the processor (resp. its ALU). It would also be part of the *syntax*.
>
> A *function* (or procedure, method), on the other hand, is a subprogram the (main) program would explicitly jump to during execution. That is, a new stack frame is allocated, register values are saved, parameters are passed and only then is the function executed. See [here](https://en.wikipedia.org/wiki/Subroutine) for details. Furthermore, functions are defined by the programmer.

----

번역하자면,

역사적으로 내 추측은 이러하다. 차이점은 프로그래밍 언어가 어떻게 기계어 코드로 변환되느냐에 뿌리를 두고 있다는 것이다.



#### 문제

- 연산자와 함수의 차이점을 모르겠다. 
  - 딴지 1. 문제의 실효성 ) 왜 이게 문제가 되는가?
    - 자바스크립트 스펙상에서 연산자와 함수를 구분하고 있는데, 이 구분으로 뭘 하는게 있는가? 

- 근본적인질문
  - 1. 연산자와 함수를 구분지을 수 있는 근거가 있는가? (자바스크립트 한정)
    2. 연산자와 함수의 실질적인 차이점이 있는가?
    3. 이를 포괄하는 질문은, '자바스크립트에서는 왜 연산자와 함수를 구분하는가' 일 것이다. 

-  부가적인 질문

   -  return, 괄호 같은 다른 키워드 들도 스펙정의와 어디서 구분되는지가 확인 필요.


#### 가설

1. 연산자는 미리 만들어놓은 것이다. 
   1. 반론 : 내장함수는 미리 만들어 놓은 것 아닌가? 그럼 왜 귀찮게 내장함수 따로 정의하고 함수 따로 정의하는가?
2. 오버라이딩 가능 여부에 따른 구분
3. 함수는 연산자라는 단어를 써서 만든 문장에 불과하다. 예를 들어 예제에서 자주 사용 하는  var sum = function(){return a+b;} 라는 것은 
4. 처리영역 : 컴파일러가 처리하느냐? 이게 문제가 아니더라도 확인을 해보자. 
5. 연산자는 예약어다. 
6. 연산자는 값을 반환한다.
7. 의미없는 개념상의 구분
8. 함수는 new를 사용해서 생성자로 사용할 수 있지만, 



#### 검증

올바른 검증을 위해서는 함수, 연산자 각각의 핵심적인 기능에 대해 알아야 한다. 

연산자가 뭔지 모르겠으니, 함수에서 제공하는 기능을 보고 이걸 연산자에서 얼마나 지원하는지 확인해보자. 

1. 함수는 일급 '객체'다. 





### 공통점 정리 

1. 연산자와 함수는 인자를 받아서 리턴을 한다. 
2. ...



#### 차이점





### 1. 실행방식의 차이

- 함수는 코드가 있는 주소로 이동, 
- 연산자는 컴파일러가 정해놓은 명령으로 수행



### 2. 표현 및 사용방식의 차이(호출 방식의 차이)

- 함수는 사용하는 형식이 정해져있다. 괄호를 붙여서 호출한다. 
- 연산자는 괄호가 필요없다. 



### 3. 파라미터의 위치와 용법

- 연산자는 후치연산자, 전치연산자 등... 놓이는 위치에 따라 기능마저 달라짐. 
- 함수는 그런거 없음. 정해진대로 사용하지 않으면 에러를 뱉어냄



### 3. 생성자로 사용 가능여부의 차이

- 함수가 생성자로 사용이 가능하다면, new isNaN () 도 가능한가? 아니다. 이건 아닌 것 같다. 



### 4. 리턴 여부의 차이

- 연산자는 리턴이 무조건 있다. 





## II. 연산자의 종류

### 대입 연산자(할당 연산자)

#### 단일 대입연산자

```javascript
var a = 1;
```

##### 컴파일 순서 : 

1)  var a 수행

2)  1 수행

3) 우항을 좌항에 대입



#### 복합 대입연산자

- 단일대입연산자 앞에 연산자가 더 붙은 형태
- 대입연산자 앞의 부분을 먼저 수행하고 대입한다.

```javascript
var a = 1;
a += 2; // a = 3
```



### 산술 연산자

+, -, *, / 를 만나면 자바스크립트는 대상을 숫자로 자동형변환을 시도한다. 



### 단항연산자

+, - 로 뒤에오는 값을 숫자로 바꾸어 리턴한다.

```javascript
var a = '5';
var numA = +a;
var numB = -a;
console.log(numA);
```






### 증감 연산자

- ++ : 1을 더함 
- — : 1을 뺌.


##### 연산자가 앞에 있는 경우

증감처리를 먼저 하고 나머지 연산을 처리

```javascript
var i = 1; 
var j = ++i;  //i=2, j=2
```



##### 연산자가 뒤에 있는 경우

연산을 수행한 다음에 증감처리.

```javascript
var i = 1; 
var j = i++;  //i=1, j=2
```



(주의!!) 후치연산자는 현재 루틴에 영향을 주지 않는다. 

```javascript
let nums = [1, 2];
let seq = 0;
nums[seq++] = "x"; // nums[0] = "x" 실행 후에, seq에 1을 더한다.
console.log(seq); // 1
console.log(nums); // ["x", 2]
```





### 비교 연산자

### 종류

- == : 타입을 동일하게 변환 후 값이 일치하면 true 반환
- != : 타입을 동일하게 변환 후 값이 일치하지 않으면 true 반환
- === : 타입을 변환하지 않고, 타입과 값이 일치할 경우 true 반환
- !== :타입을 변환하지 않고, 타입과 값이 일치하지 않으면 true반환



### 적용 방식

- 기본타입을 비교할 때는 값을 비교
- 참조타입을 비교할 때는 참조값(위치)을 비교




### 논리 연산자

### 종류 

- ||
- &&
- !

#### OR 연산자

```javascript
var a = 좌측 피연산자 || 우측 피연산자
```

OR 연산 수행시, 논리적으로 둘 중 하나만 true라면 true의 값을 반환해야 한다. 

자바스크립트는 좀 유연하게 작동하는데, 좌측 피연산자의 값이 true일경우, 좌측 피연산자의 결과값을 반환하여 a에 대입하도록한다. 



AND 연산자


#### 논리연산자의 활용

```javascript
function enter(userName) { userName && logIn(userName) || signUp (); }
```

userName이 있으면 logIn을, 없으면 singUp을 리턴한다.



#### 대소비교 연산자

아래와 같은 결과는 true를 반환하는데, 아래와 같은 케이스에서 자바스크립트는 내부적으로 우선 Boolean으로 값을 캐스팅 한 후에 비교한다는 것을 알수 있다.

```javascript
console.log(0 < true); // true
```





#### string 타입 비교

String 타입을 서로 비교할 경우, 유니코드를 비교한다. 

아래와 같이 하나만 문자타입인 연산은 false로 처리된다. 

```javascript
console.log(1 > 'a')
console.log(1 < 'a')
console.log(undefined < 'a')
console.log(undefined > 'a')
console.log(null > 'a')
console.log(null < 'a')
```





---



### 관계 연산자

- in
- instanceof
- typeof



#### typeof

typeof 도 연산자이다. (관계 연산자)

typeof는 피연산자의 타입을 문자열 형태로 리턴하는데, 주의할 점은 다음과 같다. 

- 함수는 function을 리턴
- 배열은 object를 리턴
- null은 object를 리턴



### !!

느낌표 두개짜리 연산자는 true 혹은 false 만을 리턴해준다. 즉, 피연산자를 불린 값으로 변환해주는 것이다. 

주의할 점은 {} 이런 빈 객체가 true로 리터된다는 점이다. 

- 0, null, undefined, ''(빈문자열) : true 반환
- 1, {} : true 반환 



### in

객체에 해당 속성이 존재하는지를 boolean으로 리턴

```javascript
let "a" in ["a", "b", "c"] // true
let "a" in {a:1, b:2, c:3} // true
```





## 연산자와 메모리

- 모든 연산자는 스택메모리를 유발한다. 
- 스택메모리를 유발하지 않는 연산자 : tail recursion 의 대상이 된다. (지연평가를 하기 때문에)
  - AND(&&), 
  - OR ||
  - 삼항연산자(? :)





연산자 우선순위

https://developer.mozilla.org/ko/docs/Web/JavaScript/Reference/Operators/Operator_Precedence

