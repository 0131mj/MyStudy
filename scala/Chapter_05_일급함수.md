# Chaper 5 일급함수

* 함수형 프로그래밍의 핵심 가치 : 함수는 "일급 객체 "

- 선언, 호출, 매개변수 및 반환값으로 사용가능

  ​

- 고차함수 : 다른 함수를 매개변수로 받아들이거나 반환값으로 사용하는 함수

- map() : 함수를 매개변수로 취하고, 이를 사용하여 하나 또는 그 이상의 항목을 새로운 값이나 타입으로 전환

- reduce() : 함수를 매개변수로 취하고, 이를 사용하여 여러 항목을 가지는 컬렉션을 단일 항목으로 축소함.

  ​

- 고차함수의 유용성 : '데이터 처리 방식'은 프레임워크에 위임. '처리할 데이터'만 신경쓰면 됨. (선언형 프로그래밍)

- 선언형 프로그래밍 : 작업을 선언하기만 하고 직접 수행은 하지 않음.

- 명령형 프로그래밍 : 연산의 논리의 흐름을 명시적으로 기술함.



## 함수 타입과 값

함수타입이란, 함수의 타입을 나타내는 말로, 입력과 출력값으로 이루어져 있다.



###### 구문 : 함수 타입 

```scala
([<입력타입>, ...]) => <출력타입>
```



예제를 REPL에서 실행해보자.

```scala
scala> def double(x: Int): Int = x * 2
double: (x: Int)Int

scala> double(5)
res0: Int = 10

scala> val myDouble: (Int) => Int = double // *1
myDouble: Int => Int = $$Lambda$1060/196237139@ee21292

scala> myDouble(5)//*2
res1: Int = 10

scala> val myDoubleCopy = myDouble
myDoubleCopy: Int => Int = $$Lambda$1060/196237139@ee21292

scala> myDoubleCopy(5)//*3
res2: Int = 10
```



* *1 : myDouble  앞에 보면 val 키워드를 사용하여 값으로 선언한 후, 입력타입과 출력타입의 타입구문을 덧붙여놓았다.  
  이는 myDouble이라는 값이 함수의 형태가 될 수 있음을 말한다.
* *2  : myDouble은 값이지만, 여기에 매개변수를 삽입하여 함수처럼 호출을 할 수 있으며, myDobule은 double을 복사한 것이므로, double을 호출한 것과 같은 결과가 출력된다.
* *3 : 한번 더 복사해서 사용이 가능하다. 
* Lambda란 무엇인가???



###### 구문: 와일드카드 연산자로 함수 할당하기

```
val <식별자> = 함수명 _
```



'mul2' 함숫값을 가지고 이 구문을 사용해보자.(책에서는 double이라고 했는데 자료형 같아서 헷갈려서 이름 바꿈)

```scala
scala> def mul2(x: Int): Int = x * 2
mul2: (x: Int)Int

scala> val myMul2 = mul2 _
myMul2: Int => Int = $$Lambda$1076/1176013449@6f65a203

scala> val amount = myMul2(20)
amount: Int = 40

scala> val amountF = myMul2(1.25)
<console>:12: error: type mismatch;
 found   : Double(1.25)
 required: Int
```

(와일드카드 연산자라고 해서 아무 타입이나 넣어도 될 줄 알았더니 그게 아닌가보다.)



책에서 설명하길, '언더스코어는 미래의 함수 호출에 대한 자리표시자 역할을 한다.' 라고 되어있는데 이말은

그냥 자리를 만들어 둔 것이고 나중에 호출될 때 알아서 지정한다, 라는 말 같음. 



###### 다중 매개변수 예제 : 최대값 구하기

```scala
scala> def max(a: Int, b: Int) = if (a > b) a else b
max: (a: Int, b: Int)Int

scala> val maximize: (Int, Int) => Int = max
maximize: (Int, Int) => Int = $$Lambda$1038/1821228886@493b01ef

scala> maximize(50, 40)
res0: Int = 50

```



입력값이 없는 함수타입 예제

```scala
scala> def logStart() = "=" * 50 + "\nStarting NOW\n" + "=" * 50
logStart: ()String

scala> var start: () => String = logStart
<console>:12: warning: Eta-expansion of zero-argument method values is deprecated. Did you intend to write logStart()?
       var start: () => String = logStart
                                 ^
start: () => String = $$Lambda$1085/3998546@bb6f3f7

scala> println( start() )
==================================================
Starting NOW
==================================================
```

?? 에러값이 출력된다. 아마 스타트에 괄호가 빠졌기 때문이 아닌가 싶다. 



```scala
scala> var myStart: () => String = logStart()
<console>:12: error: type mismatch;
 found   : String
 required: () => String
       var myStart: () => String = logStart()
                                           ^
```

.. 인 줄 알았는데 아닌 것 같다. 



하단링크 참조

https://stackoverflow.com/questions/45657747/deprecation-warning-when-compiling-eta-expansion-of-zero-argument-method



## 고차 함수

입력 매개변수나 반환값으로 함수 타입을 가지는 함수

```scala
scala> def safeStringOp(s: String, f: String => String) = {
     |   if (s != null) f(s) else s
     | }
safeStringOp: (s: String, f: String => String)String

scala> def reverser(s: String) = s.reverse
reverser: (s: String)String

scala> safeStringOp(null, reverser)
res0: String = null

scala> safeStringOp("Ready", reverser)
res1: String = ydaeR
```

* 'null'로 호출하면 안전한 값(???)을 반환하는 반면, 유효한 String으로 호출하는 경우 입력값을 거꾸로 한 값을 반환함.
* 함수를 매개변수로 사용하는 다른 방법 : 함수 리터럴과 함께 인라인으로 정의 (다음 절에 계속)

## 함수 리터럴

## 자리표시자 구문

## 부분 적용 함수와 커링

## 이름에 의한 호출 매개변수

## 부분 함수

## 함수 리터럴 블록으로 고차 함수 호출하기

## 요약

## 연습문제

