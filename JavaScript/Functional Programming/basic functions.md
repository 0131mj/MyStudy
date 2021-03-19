# Basic Functions

함수형 프로그래밍에서 기초 재료가 되는,  원자적인 함수들을 설명한다.

- map
- filter
- reduce



## map

주어진 조건을 일괄적으로 적용한 새로운 배열을 리턴

```javascript
const map = (f, iter) => {
    const res = [];
    for(const i of iter){
        res.push(f(i));
    }
    return res;
}
```

- f는 하나의 인자를 받아 새로운 값을 리턴하는 함수이다.
- for ...of 문을 사용했기 때문에, Array.prorotype.map 과는 달리,  array 뿐만 아니라 iterable 프로토콜을 따르는 모든 값(NodeList, Map, Set...)을 지원한다.

```javascript
const m = new Map();
m.set('a', 10);
m.set('b', 20);
log(m); 									  // Map(2) { 'a' => 10, 'b' => 20 }
log(new Map(map(([k, v]) => [k, v * 2], m))); // Map(2) { 'a' => 20, 'b' => 40 }
```





## filter

주어진 조건을 만족하는 새로운 배열을 리턴

```javascript
const filter = (f, iter) => {
    const res = [];
    for(const i of iter){
        if(f(i)){
            res.push(i)
        }
    }
    return res;
}
```

- f는 하나의 인자를 받아 boolean 값을 리턴하는 함수이다.
- iter 에는 제너레이터의 즉시 실행 결과도 들어갈 수 있다. 

```javascript
log(...filter(a => a % 2, function* () {
    yield 1;
    yield 2;
    yield 3;
    yield 4;
    yield 5;
}()))
```





## reduce

주어진 데이터를, 주어진 함수로 순회하고 누진시켜 하나의 결과값을 생성

```javascript
const reduce = (f, iter, acc) => {
    if (acc === undefined) { // !acc 를 하게 되면 0 일때 오류가 생긴다.
        iter = iter[Symbol.iterator](); //(a) 진행을 하기 위해, 소비할 이터러블을 새롭게 생성
        acc = iter.next().value;
    }
    for (const i of iter) { //(b) acc가 주어지지 않았을 경우, 여기서 순회하는 iter는 (a)에서 생성한 이터러블
        acc = f(acc, i); //(c) 누적값과 순회값 처리를 주입된 reducer에 위임
    }
    return acc;
};
```

- 여기서 f는 map, filter의 f와는 달리, 두개의 인자(acc, cur)를 받아 새로운 acc를 리턴하는 함수이다.(리듀서)
- acc 존재여부에 따라, 순회할 대상 자체가 달라진다. 
  - acc 있음 : iter 는 함수의 인자 원본
  - acc 없음 : iter 는 함수의 인자 원본 iter에서 뽑아낸 새로운 iterable  
    - (b) 단계(순회) 에 이르기 전에 진행을 해야 하므로 새롭게 만들어 놓고 시작했다.
- 둘다 실행시 Iterable을 반환하는 Well-formed iterable 이기 때문에 위는 가능하다. 
- 입력값으로 한개의 함수를 받는데, 이 함수가 누적값과 순회값으로 무엇을 할지를 알아서 정한다. (순서는 누적값(acc), 순회값(cur))



#### 주의

```javascript
const reduce = (f, iter, acc) => {
    if (acc === undefined) {
        acc = iter[Symbol.iterator]().next().value; //(a)
    }
    for (const i of iter) { //(b)
        acc = f(acc, i);
    }
    return acc;
};

```

- 이렇게 하면 오류가 발생한다. 
- (a) 라인은 얼핏 보면 앞의 두 줄 코드를 한줄로 단순화 한것 같지만, acc에서 필요한 값만 인스턴스한 값으로 취하고 버리기 때문이다. 
- (b) 라인에서의 iter는 원본이다.  (왜냐하면 위 acc에서 사용한 값은 iter의 Symbol.itertor 함수 실행 결과 에서 뽑아낸 값에 불과하기 때문이다.)







## map + filter + reduce 

```javascript
const fruits = [
    {
        name: 'banana',
        price: 1000
    },
    {
        name: 'tomato',
        price: 1500
    },
    {
        name: 'grape',
        price: 3500
    },
    {
        name: 'strawberry',
        price: 2000
    }
]

const add = (a, b) => a + b;
const price = f => f.price;
const priceUnder2000 = p => p < 2000;

log(
    reduce(
        add,
        filter(
            priceUnder2000,
            map(price, fruits)
        )
    )
)
```

- 함수형으로 코드를 작성하게 될 때, 안에 쓰여질 값이 뭐가 될지 기대하면서 쓰면 된다.
- 예를 들어서, 이건 과일 가격이 2000원 이하인 값들의 합이다. 
  - 여기서 우선 '합'을 생각해서 reduce를 만들고, 합의 대상이 될 배열을 구상한다.
    - 그리고 이 배열은 필터된 결과인데, 이 필터된 결과가 대상으로 하는 것은 2000원 이하의 가격을 가진 것들이다.