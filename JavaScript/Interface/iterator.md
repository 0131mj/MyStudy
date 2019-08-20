#  Iterator Interface



#### Iterator 

1. next 라는 키를 갖고
2. 값으로 인자를 받지 않고 IteratorResultObject 를 반환하는 함수가 온다. 

```javascript
const iterator = {
    next : () => IteratorResultObject
}
```



#### IteratorResultObject

```javascript
{
    value : 1,
    done : true
}
```

1. value : 그때 그때 필요한 값 
2. done : 계속 반복할 수 있을지 없을지에 따른 불린값 



즉, 종합하면 이런 모습이다. 

```javascript
const iterator = {
    next(){
        return {
            value : 1,
            done : true
        }
    }
}
```





## iterator 구현

```javascript
const log = text => {
  document.getElementById("app").innerHTML += `${text}<br>`;
};

const iterator = {
  data: [1, 2, 3, 4],
  next() {
    return {
      done: this.data.length === 0,
      value: this.data.pop()
    };
  }
};

let isDone = false;
while (!isDone) {
  let iResult = iterator.next();
  log("result : " + iResult.value);
  isDone = iResult.done ? true : false;
}
```





# Iterable Interface

1. Symbol.iterator 라는 키를 갖고
2. 값으로 인자를 받지 않고 Iterator Object를 반환하는 함수가 온다. 



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
    return Iterator  ;
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