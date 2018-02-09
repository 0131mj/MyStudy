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

###### 타입을 가진 입력인수(x)와 함수 본문(x * 2)의 정의

```scala
scala> var doubler = (x: Int) => x * 2
doubler: Int => Int = $$Lambda$1024/697240075@2b960a7

scala> val doubled = doubler(22)
doubled: Int = 44
```

* 함수 리터럴은 함숫값과 변수에 저장되거나 고차함수 호출의 부분으로 정의 가능 



> ###### 익명 함수 (Ananymous function)
>
> 함수리터럴은 함수 이름을 포함하지 않으므로, 문자 그대로 이해하면 됨. 



> ###### 람다표현식
>
> C#과 자바 8에서 사용



> ###### 람다(Lambda)
>
> 람다 표현식의 축약형



> ###### function0, function1, function2, ...
>
> 함수 리터럴에 대한 스칼라 컴파일러 용어, 입력 인수의 개수를 기반으로 함



* 익명함수라고 부르지 않는 이유 :

본래는 이 개념을 '익명함수' 라는 용어로 불렀지만, '모든 로직이 인라인으로 기술된다는 점'에서 볼 때 
'익명함수' 라는 이름이 더 특징을 명확히 나타낸다고 판단함.

###### 구문 : 함수 리터럴 작성하기

```
([<식별자>]: <타입>, ...]) => <표현식>
```



###### 함숫값을 정의하고 새로운 함수 리터럴에 할당

```scala
scala> val greeter = (name: String) => s"Hello, $name"
greeter: String => String = $$Lambda$1162/407757655@efe49ab

scala> val hi = greeter("World")
hi: String = Hello, World
```

* 함수 리터럴은 근본적으로 매개변수화된 표현식.



```scala
scala> def max(a: Int, b: Int) = if (a > b) a else b  // *1
max: (a: Int, b: Int)Int

scala> val maximize: (Int, Int) => Int = max  // *2
maximize: (Int, Int) => Int = $$Lambda$1167/1301695646@42172065

scala> val maximize = (a: Int, b: Int) => if (a > b) a else b  // *3
maximize: (Int, Int) => Int = $$Lambda$1168/1898859288@af96ac9

scala> maximize(84, 96)
res0: Int = 96
```

*1 : 원본 함수 max()

*2 : 함숫값에 할당됨

*3 : 함수 리터럴로 재정의 됨.



###### 인수를 취하지 않는 함수 리터럴

```scala
scala> def logStart() = "=" * 50 + "\nStarting NOW\n" + "=" * 50
logStart: ()String

scala> val start = () => "=" * 50 + "\nStarting NOW\n" + "=" * 50
start: () => String = $$Lambda$1057/1768142988@ab24484

scala> println ( start() )
==================================================
Starting NOW
==================================================
```

( )String 에서 볼 수 있듯이, 이는 입력매개변수가 없고, String을 반환하는 함수이다. 



###### safeStringOp를 활용한 함수 리터럴

```scala
scala> def safeStringOp(s: String, f: String => String) = {
     | if (s != null) f(s) else s
     | }
safeStringOp: (s: String, f: String => String)String

scala> safeStringOp(null, (s: String) => s.reverse)
res1: String = null

scala> safeStringOp("Ready", (s: String) => s.reverse)
res2: String = ydaeR
```

함수 매개변수 'f'의 타입은 String => String 이다. 



###### 명시적 타입과 괄호를 제거한 함수 리터럴

```scala
scala> safeStringOp(null, s => s.reverse)
res3: String = null

scala> safeStringOp("Ready", s => s.reverse)
res4: String = ydaeR
```

함수의 기본적인 본질만 남음. 함수리터럴은 입력 매개변수를 받아 그 매개변수로 연산을 수행한 결과값을 반환



## 자리표시자 구문

함수 리터럴의 축약형으로, 지정된 매개변수를 와일드카드로 대체한 형태임.

아래의 경우에 사용

1. 함수의 명시적 타입이 리터럴 외부에 지정
2. 매개변수가 한번 사용되지 않는 경우에 사용

```scala
scala> val doubler: Int => Int = _ * 2
doubler: Int => Int = <function1>
```

?? 윈도우에서 하니까 이렇게 나옴....

```scala
scala> val doubler: Int => Int = _ * 2
doubler: Int => Int = $$Lambda$1034/1547965072@3c78e551
```

맥에서는 이렇게 나옴



###### 자리표시자 구문을 이용한 safeStringOp 예제

```scala
scala> def safeStringOp(s: String, f: String => String) = {
     | if (s != null) f(s) else s
     | }
safeStringOp: (s: String, f: String => String)String

scala> safeStringOp(null, _.reverse)
res1: String = null

scala> safeStringOp("Ready", _.reverse)
res2: String = ydaeR
```



###### 두 개의 자리표시자를 가진 예제

```scala
scala> def combination(x: Int, y: Int, f: (Int, Int) => Int) = f(x,y)
combination: (x: Int, y: Int, f: (Int, Int) => Int)Int

scala> combination(23, 12, _ * _)
res0: Int = 276
```



###### 세 개의 자리표시자를 사용한 예제

```scala
scala> def tripleOp(a: Int, b: Int, c:Int, f: (Int, Int, Int) => Int) = f(a,b,c) 
tripleOp: (a: Int, b: Int, c: Int, f: (Int, Int, Int) => Int)Int

scala> tripleOp(23, 92, 14, _ * _ + _ )
res0: Int = 2130
```



## 부분 적용 함수와 커링

## 이름에 의한 호출 매개변수

## 부분 함수

## 함수 리터럴 블록으로 고차 함수 호출하기

## 요약

## 연습문제

