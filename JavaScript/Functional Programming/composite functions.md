# composite functions



## go

초기값과, 연속적으로 이어질 함수들을 입력받아, 하나의 값으로 귀결시키는 함수

```javascript
const go = (...args) => reduce((a,f) => f(a), args);

go(
    0, 
    a => a + 1,
    a => a + 10,
    a => a + 100,
    log
);
// 111
```

- reduce 를 사용한다.



## pipe

함수 여러개를 입력받아, 하나의 함수로 합성해주는 함수

```javascript
const pipe = (...fs) => (a) => go(a, ...fs);

const f = pipe(
    a => a + 2,
    a => a + 20,
    a => a + 200,
);

log(f(0));
```

- go 를 사용한다.



## curry