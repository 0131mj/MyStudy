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

**구문 : 함수 타입**

```scala
([<입력타입>, ...]) => <출력타입>
```



REPL에서 실행

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