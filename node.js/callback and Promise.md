# 콜백과 프로미스



## 콜백

- 콜백을 쓰는 이유는 비동기로 작동하기 때문이다. 

콜백 헬

```javascript
( ) =>{
    ( ) =>{
        
    }
}
```





## 프로미스 

```javascript
const plus = new Promise((resolve, reject) => {
    const a = 1;
    const b = 2;
    if(a + b > 2){
        resolve(a+ b);
    }else{
        reject(a+b)
    }
});

plus
    .then((success) => {
    	console.log(success)
	})
    .catch((fail) => {
    	console.log(fail)
	})
```

- 프로미스는 콜백함수를 순차적으로 실행하기 위해 만들어진 함수이다. 
- 위 코드 상에서 plus 라는 변수는 Promise라는 생성자를 통해 만들어진 promise 객체이다. 따라서 promise 객체에 내장된 프로토타입 함수로 then 과 catch 를 사용할 수 있다. 
- then을 연이어 쓰려면 return 값이 있어야 한다. 
- 프로미스를 이해하려면 우선 비동기와 콜백에 대해 정확하게 알고 있어야 한다. 
- 콜백에 대해서 이해를 하려면, 함수가 값으로서의 기능을 한다라는 것을 알아야 한다. 





## 동기 vs 비동기

- 동기 : 순차적임. 혼자서 다하는 거.
- 비동기 : 동시다발적, 어떤게 먼저 끝날지 모름. 다른 사람에게 일을 시켜놓는거.



## 콜백

자주 쓰는 용어이긴 한데 정확하게 다른 곳에서 어떻게 설명을 하고 있는지 알아보자. 



#### 생활코딩에서 설명하는 콜백

```javascript
funcion inserted = (num){
    if(num > 1){
    	return num + 1    
    }else{
        return num -1
    }   
}

function origin(inserted);
```

- 자바스크립트에서는 함수를 값으로 전달할 수 있다. 
- 함수로 된 값을 받아서 원래함수를 제어하는 프로그래밍 방식을 콜백 이라고 부른다. 



#### 나무위키 

함수의 호출 실행시점을 프로그래머가 아닌 시스템에서 결정하는 함수



여기에 콜백함수에 대한 설명이 잘 되어 있다. 

http://yubylab.tistory.com/entry/%EC%9E%90%EB%B0%94%EC%8A%A4%ED%81%AC%EB%A6%BD%ED%8A%B8%EC%9D%98-%EC%BD%9C%EB%B0%B1%ED%95%A8%EC%88%98-%EC%9D%B4%ED%95%B4%ED%95%98%EA%B8%B0