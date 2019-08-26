## Sync Async



## Sync : 바로 리턴

- 서브루틴이 즉시 값을 반환함
- 함수가 값을 리턴한다. 

```javascript
const double = v => v * 2;
console.log(double(2)); //4
```



## Async : 콜백 호출

- 서브루틴이 콜백을 통해 값을 반환함
- 인자에 함수가 들어있다.

```javascript
const double = (v, f) => f(v*2);
double(2, console.log); //4
```



## Block - NonBlock, Sync - Async 의 조합

모든 API는 다음 4가지 경우 중 하나에 속한다. 

- Block Sync : Normal API, (or legacy API) 보통의 일반적인 API

- NonBlock Sync : old API 

- Block Async : Trap - 피해야 할 최악의 API

- NonBlock Sync : modernAPI - 가장 이상적인 API

  
  
  

목적은 Async 코드를 sync 처럼 보이게 하는 것.