# Array.prototype.reduce()



reduce는 배열에서 사용되는 내장함수로, 흔히 값을 누적하여 토탈 값을 구해낼 때 쓰인다. 

하지만 reduce는 array가 사용할 수 있는 함수 중에서도 가장 매우 강력하다고 소문이 나있는데,  

설정값도 많고 복잡해보여 잘쓰이지 않는다. 

최대한 쉽게 알아보도록 하자. 



## 기본 문법

일단 아주 기초적인 문법으로 필요한 요소만 기술하면 다음과 같다. 

reduce 안에 콜백함수 하나. 

```javascript
const arr = [1, 2, 3]; 
arr.reduce(callbackFunc);
```



그렇다. reduce 는, **콜백함수를 실행하는 함수**인것이다. 

그러면 여기에 들어갈 수 있는 콜백함수가 어떤 것이길래 reduce 가 작동하는 것인지 알아보자. 



## callback 함수

reduce 안에 들어가는 callback 함수에는 인수를 4개나 받을 수 있다. 

4개... 그래서 복잡해보여서 나는 잘 안썼다. 

그런데 반가운 소식은 꼭 써야 하는 건 인수 중에서 2개 뿐이라는 것이다. 

- 2개 : 꼭 써야 함.
- 2개 : 안써도 됨.



참고할 것

https://kwangyulseo.com/2015/06/16/javascript-reduce-%ED%95%A8%EC%88%98/