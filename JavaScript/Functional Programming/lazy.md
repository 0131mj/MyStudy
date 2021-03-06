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

const range5 = range(5); // [0,1,2,3,4]
```

- range(5)를 호출하는 순간 값이 생성되어 담겨버린다.

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

const lrange5 = range(5); // L.range{<suspened>}
```

- range(5)를 호출하는 순간, 값을 순회할 수 있는 이터러블구조를 리턴해준다.



#### 사용시 비교

```javascript
for (const i of iter){
    ...
}
```

- reduce 내부에서 루프문을 돌 때, 차이가 난다. 
  for ...of 문에서 iter 는 이터레이터가 되도록 내부적으로 iter[Symbol.iterator] 를 수행한다.

  (range 가 스테이크를 다 썰어놓고 먹는 거라면,  L.range 는 필요할 때 한입씩 썰어먹는 거라고 볼 수 있다.)

- L.range는 사용될 때 이터러블을 소비하는 반면, range는 생성과 동시에 평가가 되며, 값이 저장되어버린다.



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





```javascript
go(
    L.range(10),
    take(2),
    log
)
```

위의 코드는 어떻게 평가되는가?  take로 들어간 값은 10개의 값을 가진배열이 아니라, 제너레이터로 만들어진 이터러블이다.

이 이터러블이 take에서 for...of 문을 수행할 때 꺼내어지므로, L.range(10)에서 next는 두번만 발생한다.

(코드 실행이 끝나도 done이 된 상태가 아닌 것이다.)



## L.map

```javascript
L.map = function* (f, iter) {
    for (const i of iter) {
        yield f(i);
    }
}
```

- 생성하는 것만으로는 데이터가 만들어지지 않고, next를 했을 때 하나씩 값을 순회할 준비를 한 이터러블을 리턴한다.



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