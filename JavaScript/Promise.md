# Promise



## 개념

결과를 갖고 있지만, then이나 catch를 붙이기 전까지는 반환하지 않는 것.

(콜백은 곧바로 실행되어 버린다.)

장점은 코드를 연이어 쓰지 않아도 나중에 쓸 수 있다는 점이다.

```javascript
const myPromise = (message) => ( new Promise(
    (resolve, reject) => {
        resolve(message);
    }
))

// ... 100줄의 코드
myPromise
	.then(yourPromise)
```





유래

Promise 란, 프로그래밍에서 병렬처리를 위해 처음 고안된 패턴으로, 

Python, Java, Scala 등의 언어에도 이 개념이 존재한다. 

( 타 언어에서는 Future, Promise, Delay 와 같은 이름으로 쓰인다. )

JavaScript에서의 Promise는 이 초기 목적에서 '병렬 쓰레드' 만 빼고는 동일하다. 



## callback hell

흔히 Callback 지옥을 해결하기 위한 도구로 알려져 있는데,

가독성이 향상되는 것은 사실이나, callback Depth를 해결하기 위한 목적으로 만들어 진 것은 아니다.

콜백을 사용했을 때 발생할 수 있는 문제점은 depth가 깊다는 것이 아니라, 제어권을 잃어버린다는 것이다.



## 제어권

프라미스를 쓰는 목적은, "then의 시점을 내가 정하고 싶어서" 라고 봐도된다. 

따라서 Promise에 then이 바로 나온다면, 프라미스로 짜긴 했지만 그냥 콜백이나 다름없이 사용하고 있는거라고 봐도 무방하다. 

Promise의 효력이 발생하는 것은 프로미스를 먼저 만들고, 나중에 그 Promise에 then을 사용하는 케이스이다.



## Promise 만들기

- Promise 는 리터럴로 만드는 것이 아니라, 내장된 생성자를 사용해서 만들어야 한다. 



## Promise 객체

비동기작업을 수행하기 위한 객체

```javascript
new Promise((resolve, reject) =>{
    resolve();
    reject();
})
```

- 매개변수 : "resolve 와 reject 를 매개변수로 갖는 콜백함수",
- 위 생성자코드는 아래의 말과 같다고 보면 된다.

> "지금부터 Promise 객체를 하나 생성할껀데, 
>
>   성공하면 어떻게 할지(resolve), 
>
>   실패하면 어떻게 할지(reject)를 알려줘 "

- .then 과 .catch 는 Promise 객체의 메소드이다. 
- 성공하면 .then , 실패하면 .catch 가 실행된다.


## .then

```javascript
const plus = new Promise(
    (resolve, reject) => {
        const a = 1;
        const b = 2;
        if (a + b > 2) {
            resolve(a + b);
        } else {
            reject(a + b);
        }
    }
)

plus
    .then((success) => {
    
	})
    .catch((fail) => {
    
	})
```

then을 연이어서 쓸 수 있다. 

promise 의 결과가 resolve 면(성공하면) 결과가 then으로 넘어가고, 

promise 의 결과가 reject 면(실패하면) 결과가 catch를 타게 된다. 

then 안에 나오는 success 는, plus라는 promise 의 리턴값이다.



- then 은 Promise 객체를 반환한다. 



```javascript
const result = p.then((data) => {console.log(data)})
// result  = Promise 객체
```





## 무조건 실패하는, 무조건 성공하는 Promise

```javascript
const successPromise = Promise.resolve("성공");
const failurePromise = Promise.reject("실패");
```





## .fetch





## .all

- 여러 프로미스를 한번에 실행해줄 수 있다. 
- 주의할 점 : 단 하나라도 실패할 경우, catch로 처리

```javascript
Promise.all([Users.findOne(), Users.remove(), Users.update()])
	.then((results) => {})
	.catch((error) => {})
```



---

참고출처 : https://www.youtube.com/watch?v=vgs9Xc8pXgw&list=PLcqDmjxt30RsbFOspFG3EsxMwhFSnGFLw&index=14





## Promise 의 에러 처리

```javascript
function wait(sec){
    return new Promise((resolve, reject) => {
        setTimeout(()=>{
            reject("error!");
        }, sec*1000)
    })
}

wait(3); // Uncaught (in promise) error !
```

- Promise 에서의 에러를 발생시카는 방법은, reject 를 호출시키는 것이다. 
- Promise 안에서 예외가 발생하면 in Promise 라는 키워드로 알림이 뜬다. 
- 이것을 일반 try catch 구문으로 호출하면 잡히지가 않는데, 이것을 잡기 위해서는 Promise 자체에 있는 catch 함수를 사용한다. 

```javascript
wait(3).catch(e => {
    console.log(e);
})
```

