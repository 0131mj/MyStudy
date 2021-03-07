# Basic Functions



함수형 프로그래밍에서 기초 재료가 되는,  원자적인 함수들을 설명한다. 

- _map
- _filter
- _reduce



## _map

주어진 조건을 일괄적으로 적용한 새로운 배열을 리턴

```javascript
const _map = (f, iter) => {
    const res = [];
    for(a of iter){
        res.push(f(a));
    }
    return res;
}
```



## _filter

주어진 조건을 만족하는 새로운 배열을 리턴

```javascript
const _filter = (f, iter) => {
    const res = [];
    for(a of iter){
        if(f(a)){
            res.push(a)
        }
    }
    return res;
}
```



## _reduce

주어진 데이터를, 주어진 함수로 순회하고 누진시켜 하나의 결과값을 생성

```javascript
const _reduce = (f, iter, acc) => {
    if(!acc){
        iter = iter[Symbol.iterator]();
        acc = iter.next().value;
    }
    for (const a of iter) {
        log("a : ", a)
        acc = f(acc, a);
    }
    return acc;
};
```

- acc 존재여부에 따라, 순회할 대상 자체가 달라진다. 
- acc가 존재하지 않으면 iter를 Array Iterator 인스턴스를 생성한다. 
- acc 있음 : iter 는 Array
- acc 없음 : Iter 는 Array Iterator 이다. 
- 둘다 실행시 Iterable을 반환하는 Well-formed iterable 이기 때문에 위는 가능하다. 



#### 주의

```javascript
const _reduce = (f, iter, acc) => {
    if(!acc){
        acc = iter[Symbol.iterator]().next().value; //(a)
    }
    for (const a of iter) {
        acc = f(acc, a);
    }
    return acc;
};

```

- 이렇게 하면 오류가 발생한다. 
- (a) 라인은 얼핏 보면 앞의 두 줄 코드를 한줄로 단순화 한것 같지만, acc에서 필요한 값만 인스턴스한 값으로 취하고 버리기 때문에 