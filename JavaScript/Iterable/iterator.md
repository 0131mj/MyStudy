#  Iterator Interface

## 개요

#### 정의

1. 반복 자체를 하지는 않지만,
2. 외부에서 반복을 하려고 할 때
3. 반복에 필요한 조건과 실행을
4. 미리 준비해 둔 객체



#### 개념

- 반복의 행위와 반복을 위한 준비를 분리



#### 효과

1. 미리 반복에 대한 준비를 해두고
2. 필요할 때 필요한만큼 반복
3. 반복을 재현할 수 있음. 



## 기본 구조

Iterator 의 구조는, 기본적으로 loop의 구조를 모방한 것이다. 

다른 점이 있다면, 

- loop 는 표현식(반복조건) + 실행문(반복을 수행할 루틴) 으로 이루어진 반면에, 
- iterator 는 표현식(반복조건) + 표현식(반복을 수행할 콜백함수) 으로 이뤄져 있다는 것이다. 

즉, iterator는 statement를 value化 한 것이라고 볼 수 있다. 

표현식은 값으로 수렴된다.

반면에 실행문은 한번 실행되면 사라져버린다. 



## 구성

1. next 라는 키를 갖고
2. 값으로 인자를 받지 않고 IteratorResultObject 를 반환하는 함수가 온다. 

```javascript
const iterator = {
    next : () => IteratorResultObject
}
```



### IteratorResultObject

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



## 



