# 객체지향의 원칙



## SOLID

- SRP Single Responsiblity : 단일 책임원칙
  - shotgun surgery : 산탄총 수술
- OCP Open Closed : 개방폐쇄
  - 확장해서 쓰도록
- LSP Liscov Substitution : 업캐스팅 안전
  - 추상층의 정의가 너무 구체적이면 구상층의 구현에서 모순이 발생함
- ISP  Interface Sergregation : 인터페이스 분리
- DIP Dependency Inversion : 다운캐스팅 금지



## 기타 격언

- DI : Dependency Indjectiion 의존성 주입
- DRY : Dont Repeat YourSelf 중복방지
- Hollywood Principle : 의존성 부패방지 - "필요할 때 내가 연락한다."
  - 객체의 값을 내가 판단해서 처리하는 것이 아니라, 추상화된 요청만 한다. 
- Law of demeter 최소지식
  - classA.methodA의 최대지식 한계
    - classA의 필드 객체
    - methodA가 생성한 객체
    - methodA의 인자로 넘어온 객체



## SRP를 준수하는 객체망이 문제를 해결

'메시지'를 통해 다른 객체에게 의뢰

만능객체 x



1. 메시지 - 의뢰할 내용
2. 오퍼레이션 - 메시지를 수신할 객체가 제공하는 서비스
3. 메소드 - 오퍼레이션이 연결될 실제 처리기



오퍼레이션은 동적바인딩을 통해 메소드로 구현된다. (인터페이스의 사용 이유)





## 의존성 종류



#### Critical : 객체의 생명주기 전체에 걸친 의존성

- 상속(extends)
- 연관(association)



#### 각 오퍼레이션 실행시 임시적인 의존성

- 의존 (dependency)



#### 의존성의 문제점

1. 수정 여파 규모증가
2. 수정하기 어려운 구조 생성
3. 순환 의존성







# Dependency Inversion

- 어떠한 경우에도 다운캐스팅 금지
- 폴리모피즘(추상 인터페이스) 사용



# Inversion of Control

- 객체지향의 궁극적인 목표점
- SOLID



### 제여역전의 개념과 필요성



#### 개념

1. Control = flow control (흐름제어)
2. 광의에서의 흐름제어 = 프로그램 실행통제
3. 동기흐름제어, 비동기 흐름제어 등



#### 문제점

1. 상태와 결합하여 진행
2. 알고리즘
3. 변화에 취약



#### 대안

1. 제어를 추상화
2. 개별제어의 차이점만 외부에서 주입받는다.



### 제어역전 실제구현

1. 전략패턴 & 템플릿 메소드 패턴
2. 컴포지트 패턴
3. 비지터 패턴
4. 추상팩토리 메소드 패턴