# lazy



## range

주어진 숫자만큼의 길이의 배열을 리턴

```javascript
const range = function (limit) {
    let i = -1;
    const res = [];
    while(++i < limit){
		res.push(i);
    }
    return res;
}
```



## L.range

주어진 숫자만큼의 길이를 필요한 시점에 리턴

```javascript
const L = {};
L.range = function*(limit){
    let i = -1;
    while(++i < limit){
        yield i;
    }
}
```





#### 사용시 비교

```javascript
for (const i of iter){
    ...
}
```

- reduce 내부에서 루프문을 돌 때, 차이가 난다. 
  for ...of 문에서 iter 는 이터레이터가 되도록 내부적으로 iter[Symbol.iterator] 를 수행한다.

  (range 가 스테이크를 다 썰어놓고 먹는 거라면,  L.range 는 필요할 때 한입씩 썰어먹는 거라고 볼 수 있다.)



성능 테스트

```javascript
const test = (name, time, f) => {
    console.time(name);
    while(time--){
        f();
    }
    console.timeEnd(name);
}

test('range', 10, ()=> reduce(add, range(10000)));
test('L.range', 10, ()=> reduce(add, L.range(10000)));
```





## take

```javascript
const take = (l, iter) => {
    let res = [];
    for (const i of iter) {
        res.push(i);
        if (res.length === l) {
            return res;
        }
        return res;
    }
}
```

- 주어진 length만큼만 iterable 을 순회하고 결과를 리턴하는 함수



## L.map

```javascript
L.map = function* (f, iter) {
    for (const i of iter) {
        yield f(i);
    }
}
```





## L.filter

```javascript
L.filter = function* (f, iter) {
    for (const i of iter) {
        if (f(i)) {
            yield i;
        }
    }
}
```



## 실행순서 비교

```javascript
go(
    range(10),
    map(n => n + 10),
    filter(n => n % 2),
    take(2),
    log
)

go(
    L.range(10),
    L.map(n => n + 10),
    L.filter(n => n % 2),
    take(2),
    log
)
```

- 위의 go 는 코드가 아래로 순차적으로 실행되는 반면,
- 아래의 코드는  take까지 통과해서 갔다가 다시 L.range로 거슬러올라온다.