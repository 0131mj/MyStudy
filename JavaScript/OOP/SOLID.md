# SOLID

- SRP Single Responsiblity : 단일 책임원칙
  - shotgun surgery : 산탄총 수술
- OCP Open Closed : 개방폐쇄
  - 확장해서 쓰도록
- LSP Liscov Substitution : 업캐스팅 안전
  - 추상층의 정의가 너무 구체적이면 구상층의 구현에서 모순이 발생함
- ISP  Interface Sergregation : 인터페이스 분리
- DIP Dependancy Inversion : 다운캐스팅 금지



## 기타 격언

- DI : Dependancy Indjectiion 의존성 주입
- DRY : Dont Repeat YourSelf 중복방지
- Hollywood Principle : 의존성 부패방지 - "필요할 때 내가 연락한다."
  - 객체의 값을 내가 판단해서 처리하는 것이 아니라, 추상화된 요청만 한다. 
- Law of demeter 최소지식
  - classA.methodA의 최대지식 한계
    - classA의 필드 객체
    - methodA가 생성한 객체
    - methodA의 인자로 넘어온 객체