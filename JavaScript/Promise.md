# Promise

결과를 갖고 있지만, then이나 catch를 붙이기 전까지는 반환하지 않는 것.

콜백은 곧바로 실행되어 버린다.



유래

Promise 란, 프로그래밍에서 병렬처리를 위해 처음 고안된 패턴으로, 

Python, Java, Scala 등의 언어에도 이 개념이 존재한다. 

( 타 언어에서는 Future, Promise, Delay 와 같은 이름으로 쓰인다. )

JavaScript에서의 Promise는 이 초기 목적에서 '병렬 쓰레드' 만 빼고는 동일하다. 



## callback hell

흔히 Callback 지옥을 해결하기 위한 도구로 알려져 있는데,

가독성이 향상되는 것은 사실이나, callback Depth를 해결하기 위한 목적으로 만들어 진 것은 아니다.



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





## .fetch





## .all

- 여러 프로미스를 한번에 실행해줄 수 있다. 
- 단 하나라도 실패할 경우, catch로 처리

```javascript
Promise.all([Users.findOne(), Users.remove(), Users.update()])
	.then((results) => {})
	.catch((error) => {})
```

