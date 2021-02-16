# exception

- 예상치 못한 예외를 처리하는 로직
- node.js 는 싱글스레드이기 때문에 예외를 처리하는 것이 필수적이다. 



## 에러 만들기

- JavaScript 에서 에러를 만드는 가장 쉬운 방법은, throw를 하는 것  



## 에러 잡기



### try catch

- throw 된 에러를 잡을 수 있다. 



### uncaughtException

- try catch 로 잡지 못하는 에러 처리

``` javascript
process.on("uncaughtException", (err)=> {
    console.error("예기치 못한 에러", err);
})
```

- 모든 에러를 잡을 수 있지만,  에러가 계속 발생하기 때문에 근본적으로 모든 에러를 해결할 수는 없다. 