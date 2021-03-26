# Code Style







## 선언형 프로그래밍으로 개선하기

언어 자체의  추상화되어 있는 키워드의 교체

- if => filter
- 값 변화 후 변수할당  => map
- break => take
- 축약 및 합산 => reduce
- while => range





### filter

- if 란, 논리적으로 모순이 생기는 이분법적인 케이스를 다루는 제어문이다.



### map





## 예제 1

1 부터 10까지의 자연수가 배열로 주어졌을 때, 홀수를 3개까지만 뽑아서 각각 제곱한 값을 합산하기

```javascript
const oddsSum = (limit, iter) => {
    let acc = 0;
    for (const i of iter) {
        if (i % 2) {
            acc += i * i;
            if (--limit === 0) break;
        }
    }
    return acc;
}

const oddsSum2 = (limit, iter) =>  arr
.filter(i => i % 2)
.map(i => i * i)
.splice(0, 3)
.reduce((acc, cur) => acc + cur, 0)

const arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

log(oddsSum(3, arr));
log(oddsSum2(3, arr));
```

- 가독성은 좋아졌다.
- 효율이 좋아진 것은 아니다. 순회하는 구간에서 break에 해당하는 부분이 filter와 map을 모두 돌고 나오기 때문이다.
- 여기서 filter는 Suspend가 걸려있어야 한다. (L.filter)



### 코드 개선하기





## 예제 2

예제 1에서 1부터 10까지 배열이 주어지는 대신, 10이하의 자연수로 계산을 한다고 가정해보자.

```javascript
const f1 = (l, f) => {
    let i = 0;
    while (i < l) {
      i++;
      if (i % 2) f(i);
    }
  };

const f2 = (l, f) => {
    _.each(f, L.range(1, l, 2));
};

f1(10, log);
log(' ');
f2(10, log);
```



기호, 변수의 반복보다는 핵심적인 키워드가 많이 등장한다.

절차형 프로그래밍이 if, for, i++, 변수, 이런 것들로 일일이 다 써줬다면,

선언형 프로그래밍은 이것들을 map, filter, take 등의 키워드로 대체해서 읽기 좋게 만든다.





## 부수효과의 컨벤션

- 함수형프로그래밍에서는 순수함수인가, 어떤 부수효과가 일어날 수 있는 함수인가에 따라 표기를 해주는 방식을 사용한다.
- fx.js 의 경우, _each를 사용하면 부수효과가 일어날 수 있음을 예상할 수 있다.







## 구구단 만들기

```javascript
const keys = [...new Array(10).keys()].splice(2, 10);
const row = (i, j) => `${i} X ${j} = ${i * j}\n`;
log(
    ...keys
    .map(i => [...keys.map(j => row(i, j)), '\n'])
    .reduce((acc, cur) => acc.concat(cur), [])
)
```





