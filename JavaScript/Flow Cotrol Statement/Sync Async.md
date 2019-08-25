## Sync Async



## Sync

- 서브루틴이 즉시 값을 반환함
- 함수가 값을 리턴한다. 

```javascript
const double = v => v * 2;
console.log(double(2)); //4
```



## Async

- 서브루틴이 콜백을 통해 값을 반환함
- 인자에 함수가 들어있다.

```javascript
const double = (v, f) => f(v*2);
double(2, console.log); //4
```

