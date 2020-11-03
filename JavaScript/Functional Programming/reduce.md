# Array.prototype.reduce()

reduce는 배열에서 사용되는 내장함수로, 흔히 값을 누적하여 토탈 값을 구해낼 때 쓰인다. 

reduce는 array가 사용할 수 있는 함수 중에서도 가장 매우 강력하다고 소문이 나있지만, 설정값도 많고 복잡해보여 잘 쓰이지 않는다. 

여기서 최대한 쉽게 알아보도록 하자. 



## (최소한의) 기본 문법

일단 아주 기초적인 문법으로 필요한 요소만 기술하면 다음과 같다. 

reduce 는, **콜백함수를 실행하는 함수**이다. 

그러면 여기에 들어갈 수 있는 콜백함수가 어떤 것이길래 reduce 가 작동하는 것인지 알아보자. 

reduce 안에 콜백함수 하나와 초기값

```javascript
const arr = [1, 2, 3, 4]; 
arr.reduce(callbackFunc, initialVal);
```



## callback 함수

reduce 안에 들어가는 callback 함수에는 인수를 4개나 받을 수 있다.  얼핏 보면 복잡해보일수 있는데, 이 중 꼭 써야 하는 건 2개 뿐이다. 

- 2개 (누적값, 현재값) : 꼭 써야 함.
- 2개 (현재 인덱스, 배열) : 안써도 됨.



설명되어있기로는 accumulator (누적기) 라고 되어있다. 

하지만 누적기라고 번역하면 함수같은 느낌을 주기 때문에 누적값이라고 이해하는 편이 더 수월하다. 



```javascript
const arr =[1, 2, 3, 4];
const result = arr.reduce((acc, cur) => {
    return acc + cur
})
```

위의 코드에서 reduce의 콜백함수로 acc 와 cur 이라는 두개의 값을 받는데, 이 연산의 결과, 즉 리턴값은 다시 이 함수의 인자값으로 들어가서 acc로 쓰인다. 그리고 cur값은 하나가 증가된 다음 인덱스의 값을 사용한다. 



자, 다시 정리를 하자면 이렇다.  



- reduce는,

- 실행의 대상이 되는 배열을 
- 0번째 인덱스부터 계속 순회하면서,
- 배열안의 원소 갯수(length)만큼 콜백함수를 실행하는데,
- 매번의 결과가
- 다음번 콜백함수의 인수로 전달된다. 



```javascript
const arr = [1, 2, 3, 4]
arr.reduce((acc,curVal) => return acc+curVal, 0)

// 총 4번의 연산 수행
// 1) (초기값,arr[0]) => 결과 1
// 2) (결과1, arr[1]) => 결과 2
// 3) (결과2, arr[2]) => 결과 3
// 4) (결과3, arr[3]) => 결과 4 (최종결과)
```







참고할 것

https://kwangyulseo.com/2015/06/16/javascript-reduce-%ED%95%A8%EC%88%98/

https://www.zerocho.com/category/JavaScript/post/5acafb05f24445001b8d796d