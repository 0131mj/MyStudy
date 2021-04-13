# Code Style

1부터 100까지의 숫자의 합을 더하는 문제는 이렇게 만들 수 있다. 



### 1부터 100까지 더하기

```javascript
const sum100 = () => {
    let acc = 0;
    for (let i = 1; i <= 100; i++) {
        acc += i;
    }
    return acc;
}
```



### 1부터 100까지 거꾸로 더하기

```javascript
const sum100 = () => {
    let acc = 0;
    for (let i = 100; i >= 1; i--) {
        acc += i;
    }
    return acc;
}
```



### 1부터 더해가다가 100이 되면 멈추기

```javascript
const sum100 = () => {
    let acc = 0;
    let cur = 0;
    while (cur < 100) {
        cur += 1;
        acc += cur;
    }
    return acc;
}
```



### 어디서부터 어디까지 더할지를 받아서, 덧셈을 실행하기

```javascript
const sum = (start, end) => {
    let acc = 0;
    for (let i = start; i <= end; i++) {
        acc += i;
    }
    return acc;
}
const sum100 = sum(1,100);
```



### 시작과 끝을 받아서 요청할때마다 더하는 함수 리턴하기

```javascript
const sumF = (start, limit) => {
    let acc = 0;
    let cur = start;
    return () => {
        if (cur > limit) {
            return acc;
        }
        acc += cur;
        cur++;
        return acc;
    }
}

const sum100 = sumF(1,100);
```



### 1부터 100까지의 숫자를 한꺼번에 받아서 하나씩 더해나가기

```javascript
const add = (arr) => {
    let acc = 0;
    for(const i of arr){
        acc += i;
    }
    return acc;
}

const naturalNums = (start, limit) => [...Array(limit+1).keys()].slice(start);
console.log(add(naturalNums(1, 100)))
```



### 1부터 100까지의 숫자와, '덧셈' 이라는 로직을 받아서 하나의 값으로 귀결시켜서 리턴하기

```javascript
const reduce = (f, iter, acc) => {
    if (acc === undefined) {
        iter = iter[Symbol.iterator]();
        acc = iter.next().value;
    }
    for (const i of iter) {
        acc = f(i, acc);
    }
    return acc;
}

const add = (a, b) => a + b;
const naturalNums = (start, limit) => [...Array(limit+1).keys()].slice(start);
reduce(add, naturalNums(1, 100))
```

