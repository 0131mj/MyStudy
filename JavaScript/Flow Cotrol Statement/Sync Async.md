## Sync Async



## Sync : 바로 리턴

- 서브루틴이 즉시 값을 반환함
- 함수가 값을 리턴한다. 

```javascript
const double = v => v * 2;
console.log(double(2)); //4
```



## Async : 콜백 호출

- 서브루틴이 다른 수단을 통해 값을 반환함
  - 다른 수단 : Promise, callback function, async iterations
- 인자에 함수가 들어있다.

```javascript
const double = (v, f) => f(v*2);
double(2, console.log); //4
```



### Async 의 단점

- 호출결과가 즉시 반환되지 않으므로 현재의 sync flow가 종료됨
- 현재 컨텍스트 내의 상태를 결과시점에 사용할 수 없음
- 요청 시의 상태를 별도로 결과시점에 전달할 부가장치가 필요



### Continuation 

- sync 로직으로 async를 사용할 수 있게 함
- sync flow가 어긋나므로 이전 sync flow 상태를 기억해줄 장치가 필요하다.
- 이 상태를 기억하고 이어주는 장치를 Continuation 이라고 한다.
- 이렇게 프로그램을 짜는 행위를 CPS : Continuation Passing Style 이라고 한다.





## Block - NonBlock, Sync - Async 의 조합

모든 API는 다음 4가지 경우 중 하나에 속한다. 

- Block Sync : Normal API, (or legacy API) 보통의 일반적인 API

- NonBlock Sync : old API 

- Block Async : Trap - 피해야 할 최악의 API

- NonBlock Sync : modernAPI - 가장 이상적인 API

  
  
  

목적은 Async 코드를 sync 처럼 보이게 하는 것.