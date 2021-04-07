# Iterable Interface

1. Symbol.iterator 라는 키를 갖고
2. 값으로 인자를 받지 않고 Iterator Object를 반환하는 함수가 온다. 



먼저 "Symbol.iterator" 라는 키를 갖는다는 말을 이해해야 한다. 

문자 그대로 보면, 키 자리가 아래처럼 기술됨을 말한다. 

```javascript
{
    [Symbol.iterator]: function (){}
}
```

이렇게 쓰면 뭐가 달라지는가?

1. 객체의 키가 [Symbol.iterator] 로 되어 있다면, 자바스크립트 엔진은 이 객체가 iterator로 동작하도록 만든다.
2. iterable은 for ...of, 전개연산자, 구조분해, 나머지 연산자 등과 함께 사용될 수 있다.



#### Iterable 이 존재하는 이유

- iterator 만 있으면 한번 수명을 다하고 없어지는데,
- 원본은 그대로 둔 상태에서 계속 반복가능한 객체를 얻기 위해서
- iterable 이라는 중간층을 한번 더 두는 것임.



#### 구현모델

```javascript
const Iterator = class {
  constructor() {
    this.data = [1, 2, 3, 4];
  }

  next() {
    return {
      done: this.data.length === 0,
      value: this.data.pop()
    };
  }
};


const iterable = {
  [Symbol.iterator]: () => {
    return Iterator;
  }
};
```



#### 최소 구현 

```javascript
const iterable = {
    [Symbol.iteraotr](){
        return {
            done:false,
            value : 1,
        }
    }
}
```



### 스펙 사항

- Iterable 은 문자열, 배열 등에 이미 구현되어 있다. 
- 자바스크립트 엔진조차도 ES6 에서 Core Object 등이 변경되고 적용되어 있다. 
- ES6 loop는 지연실행에 기반한 iterator 객체를 소비하는 형태로 되어있다. 
- array는 대표적인 iterable이며, Map, Set, NodeList 등도 Object.entries를 사용하여 순회가 가능하다.



## well-formed iterable

- 자기자신을 반환하는 로직이 구현되어있어서, 어디서든 멈추고 재실행가능.
- 이터레이터가 자기자신을 반환하는 심볼 이터레이터 메소드를 가지고 있을 때 , well-formed iterator 라고 할 수 있다.

```javascript
const iterable = {
    [Symbol.iterator](){
        let i = 3;
        return {
            next(){
                return i==0 ? {done: true}: {value: i--, done:false};
            },
            [Symbol.iterator](){return this}
        }
    }
}

const iterator = iterable[Symbol.iterator]();
console.log(iterator[Symbol.iterator]() === iterator); // true
```

##### 어째서 Well formed 가 아니면 도중에 멈추고 루프를 돌 수 없다는 걸까?

- 먼저, '어디서든 멈추고 재실행이 가능하다' 는 뜻을 정확히 알 필요가 있다.  
- 이는 예를 들자면 1) next로 진행하다가 다시 2) for of 를 돌다가 3) 다시 next를 진행하는 등의 작업을 할 수 있다는 뜻이다. 
- iterable 의 Symbol.iterator 를 수행하면, 한 벌의 iterator 루프를 얻어낼 수 있다. 이 루프 한벌로 위의 3단계 동작을 수행한다고 해보자. 
- 1) next로 진행하는 것 까지는 된다. 하지만 2) for of 문을 '순회' 하려고 하면 이 iterator 자체가 iterable이어야 한다. 즉, Symbole.iterator를 갖고 있어야 한다. 이 때 이 Symbol.iterator 가 이전의 맥락과 연결이 되려고하면, this를 리턴하도록 하면 될 것이다. 그러면 this는 현재 객체를 리턴할 것이고, 현재 객체는 지금의 상황과 next와 done을 모두 갖고 있다. 
- Symbol.iterator 함수가 반환하는 this, 이 간단한 문장이 현재의 이터레이터가 이터러블로 동작하면서도 이터레이터의 명맥을 잃지 않도록 해준다.



#### 일회성 이터러블

아래처럼 쓰면 어떻게 될까?

```javascript
const iterable = {
    i: 3,
    next() {
        return {
            done: this.i <= 0,
            value: this.i--,
        }
    },
    [Symbol.iterator]() {
        return this;
    }
}
```

- 일단, 정의에 따라 이 이터러블은 well-formed iterable 이기는 하다. 
- 하지만 이건 일회성 이터러블로, i의 값을 영구적으로 변화시켜버리므로, iterable을 한번 소비한 후에는 done이 멈춰져서 진행이 불가능하다.



##### 일회성 이터러블 vs 반복 가능한 이터러블

- 일회성 well-formed iterable은 [Symbol.iterator] 가 this를 반환한다. 
- 다회성 well-formed iterable 은 새로운 [Symbol.iterator] 메소드가 this를 반환한다.



---

참고 : https://developer.mozilla.org/ko/docs/Web/JavaScript/Guide/Iterators_and_Generators