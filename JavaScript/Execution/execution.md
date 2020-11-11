# JavaScript

자바스크립트는 두가지로 되어 있다. 

- 언어자체의 문법적인 내용
- 클래스 라이브러리 (코어객체) : Math, (
  - 언어 표준의 일부



## JavaScript Timing

상대적으로 declare time 과 runtime으로 나눌 수 있다.

- Language Code : ES2020, TypeScript
- Machine Language : Transfiler
- File : File & Deploy
- Load : Browser load Browser Parsing  (다른 플랫폼에는 없는 단계)
- Run : Runtime
- Terminate : 자바스크립트 파일은 종료되지 않는다.브라우저가 닫히면 종료된다.



## Runtime Execution

로딩 이후에 Instruction fetch 와 decoding execution 이 순환되는 과정



### Loading

메모리에 데이터가 적재되는 원리

값과 데이터로 구분되어서 정리된다.

- 값1
- 값2
- 값3
- 명령1
- 명령2
- 명령3



### Instruction fetch & decoding

- instruction : 우리가 실행할수 있는 머신에 데이터를 적재하는 과정



### execution

- 프로그램을 실행하고 메모리에 연산된 결과를 저장한다. 



## Runtime Detail

- essention definition loading : 필수적인 데이터를 선적재 하는 작업 (내장함수 : Date 등...)
- vtable mapping : 컴파일러가 가상의 메모리공간을 만들어 실제 메모리의 변수와 매핑을 한다.
- run
- runtime definition loading
- run





## Derective Reference vs Indirective Reference

- 직접참조의 문제점을 보완하기 위해 추가적인 비용(.)을 들여서 멘탈모델을 깨뜨리지 않는 것.
  - 점은 런타임에 계산된다.
- linked list





JSStack,

MicroTasks,

Log