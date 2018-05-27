# Chaper 9 객체 , 케이스 클래스, 트레이트



##### 지난 번에는 클래스를 배웠음

- 클래스 : 한번 정의되면 횟수 제한 없이 인스턴스 생성이 가능한 구성요소(붕어빵 틀 같은 것)
- 이번 장에서 학습할 새로운 구성요소 (★유용함★)
  - 클래스를 보완하고 / 변화를 주거나  / 일부 클래스를 완전히 대체하는 데 사용가능한 요소




##### 클래스의 확장판 3대장


1. 객체
2. 케이스 클래스
3. 트레이트


(... 사실 셋 사이의 연관성은 별로 없다. )





## 1. 객체

##### 구문 : 객체 정의

```scala
object <식별자> [extends <식별자>] [{ 필드, 메소드, 클래스 }]
```



##### 객체란 ? 일단 코드부터 실행

```scala
scala> object Hello{ println("in Hello"); def hi = "hi" }                                            
defined object Hello                                     
                                                         
scala> println(Hello.hi)                                 
in Hello                                                 
hi                                                       
                                                         
scala> println(Hello.hi)                                 
hi                                                       
```



### 코드 설명

- object로 객체를 정의하고, 명령문과, 함수 정의를 했다. 
- . 쩜으로 객체의 함수에 접근을 했다. 
- hi를 실행했는데, "in Hello"가 출력됐다. 
- 두번째 hi 에서는 "in Hello"가 출력되지 않았다. 



### 해설

- 이게 무슨 말이냐, 최상위레벨인 'println' 명령은 객체에 최초로 접근하는 시점, 
  인스턴스화 되는 시점에 딱 한번만 호출되고, 그 뒤에 추가적인 초기화는 일어나지 않는다는 말이다. 
- 아래 설명을 보자. 



### 객체의 특징

- object로 정의한다. 
- 자동으로 인스턴스 화, 인스턴스를 단 하나만 가지도록, 강제하는 형태의 클래스 
- 객체지향에서는 싱글톤 singleton 이라고 부름.
- new 키워드로 인스턴스 생성 ( X ), 이름으로 직접 해당객체에 접근 ( O ) - 하나밖에 없으니깐.
- 실행중인 JVM에서 최초로 접근할 때 자동으로 인스턴스화 됨. 
  (객체에 접근하기 전까지는 인스턴스화 되지 않음.)



그러니까, 객체는

생애에 단한번 !  자동으로 ! 인스턴스화 되는 구성요소





### 순수 함수

- 주어진 입력값으로만 계산하여 결과값을 반환하는 함수



객체의 더 많은 사용법

### Apply 메소드와 동반 객체



apply 복습

- 동반 객체 :  클래스와 동일한 이름을 공유하며, 동일한 파일 내에서 그 클래스로 함께 정의되는 객체

```scala
scala> :paste
// Entering paste mode (ctrl-D to finish)

class Multiplier(val x: Int){ def product(y: Int) = x * y}

object Multiplier { def apply(x: Int) = new Multiplier(x) }


// Exiting paste mode, now interpreting.

defined class Multiplier
defined object Multiplier

scala> var tripler = Multiplier(3)
tripler: Multiplier = Multiplier@616ac46a

scala> val result = tripler.product(13)
result: Int = 39
```



동반객체에 접근하는 예제

```scala
scala> :paste
// Entering paste mode (ctrl-D to finish)

object DBConnection {
  private val db_url = "jdbc://localhost"
  private val db_user = "franken"
  private val db_pass = "berry"

 def apply() = new DBConnection
}

 class DBConnection {
  private val props = Map(
   "url" -> DBConnection.db_url,
   "user" -> DBConnection.db_user,
   "pass" -> DBConnection.db_pass
  )
  println(s"Created new connection for " + props("url"))
}

// Exiting paste mode, now interpreting.

defined object DBConnection
defined class DBConnection

scala> val conn = DBConnection()
Created new connection for jdbc://localhost
conn: DBConnection = DBConnection@7ec58feb
```



### 객체를 가지는 명령줄 애플리케이션





## 2. 케이스 클래스

##### 구문 : 객체 정의

```scala
case class <식별자>([var] <식별자> : <타입> [,...])
						[extends <식별자>(<입력매개변수>)]
						[{필드와 메소드}]
```

- 자동으로 생성된 메소드 몇가지를 포함하는 인스턴스 생성이 가능한 클래스
- 자동으로 생성되는 동반 객체를 포함. (동반 객체도 자신만의 자동으로 생성된 메소드를 가지고 있다. )



## 3. 트레이트

##### 구문 : trait 정의하기

```scala
trait <식별자> [extens <식별자>][{필드, 메소드, 클래스}]
```

- 다중상속을 가능하게 하는 클래스 유형중의 하나임. 
- 클래스, 케이스 클래스, 객체, 트레이트 : 하나 이상의 클래스 확장 불가
- 클래스, 케이스 클래스, 객체, 트레이트 : 동시에 여러 트레이트 확장가능
- 트레이트 : 인스턴스화 불가능

다중 확장 전용인듯 ?



추상클래스 vs 인터페이스

인터페이스 vs 트레이트

### 셀프 타입 self_type

### 트레이트를 이용하여 인스턴스화



## 인스턴스 구성원 임포트 하기



## 요약

- 클래스 : 스칼라 애플리케이션의 핵심 구성요소
- 클래스는 트레이트에 의해 강화
- 클래스는 
