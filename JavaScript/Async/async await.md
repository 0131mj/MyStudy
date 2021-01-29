# async, await

 async await 문법은 세미-코루틴으로,  Promise를 간단하게 사용하는 문법이다. 

```javascript
function delay(a){
    return new Promise(resolve => setTimeout(() => resolve(a), 300));
}

async function f1(){
    const n = delay(0); // n = Promise
    const a = await delay(10); // a = 10;
    const b = await delay(5);  // b = 5;
    return a + b;
}

f1(); // Promise

/** 꺼내서 쓰기 **/

// 방법 1
(async ()=>{
    console.log(await f1()); 
})();

// 방법 2
f1().then(result => console.log("result : ", result))

// 방법 3
f1().then(console.log)
```

- 위 코드에서 await 를 붙이지 않은채 delay 를 하면 Promise를 받지만,  앞에 await 키워드를 붙여주면 resolve 된 값을 받는다. 
- await 뒤에 사용하는 함수는 반드시 Promise를 리턴해야 한다. 
- async 의 결과값은 Promise 이다. 
- 수행한 결과값을 받아서 처리할려면, 즉시 실행함수나 .then()을 사용해서 처리하는 등의 추가 작업이 필요하다.



## 구성 (with try... catch)

- aync 문은 3단으로 구성된다.  async > try >await
- 우선, async await 를 사용하려면 try catch 가 필수라는 것을 알고 시작하자. 
- ( Promise에 비해편해졌다고 하기는 하지만, try...catch가 )



### async

async 함수는 아래와 같이, 일반 함수 앞에 async라는 키워드를 붙여서 만든다. 

```javascript
async function myFunc(){
    
}
```

자바스크립트에서, 동기처리를 하겠다는 것은 특수한 상황이므로, 

이 함수를 동기처리로 움직이겠다는 것을 async 라는 키워드를 사용해 명시적으로 설정해주는 것이다. 



### await

```javascript
async function myFunc(){
    await
}
```

async 내부에서 await라는 키워드를 사용할 수 있는데, 

Promise 에 있는 내용을 실행하고, resolve에 있는 내용을 리턴해준다.

await 는 일반함수에 붙여도 괜찮다.



즉, await 키워드는 Promise 내부의 값을 꺼내보는 기능을 한다.



### try catch 예외처리 

```javascript
async () => {
    try{
        
    }catch{
        
    }
}
```

- async 문에서는 promise 와 같이. then, then, catch 이렇게 이어지는 패턴을 사용할 수는 없다
- async 함수는 return 혹은 throw 값이 담긴 Promise를 리턴하므로, then 또는 catch를 결과값으로 받아 실행해주면 된다.

```javascript
const returnPromise = async () => {
  return 'zero';
};
returnPromise().then((res) => {
  console.log(res); // 'zero'
});
```



### 예외처리의 분기

```javascript
async(){
    try{
        const firstResult  = await dbSelect("userName");
        const secondResult = await dbUpdate("userName", "userName2");
    }catch(err){
        console.error(err)
    }
}
```

- catch는 firstResult 와 secondResult 를 함께 처리한다. 
- 별도로 따로 처리하려면 아래와 같이 구성해야 한다. 



```javascript
async(){
    try{
        const firstResult  = await dbSelect("userName");
    }catch(err1){
        console.error(err1)
    }
    try{
        const secondResult = await dbUpdate("userName", "userName2");
    }catch(err2){
        console.error(err2)
    }
}
```





## async vs Promise

```javascript
async function myAsyncFunc(){
    return "done!";
}

function myPromiseFunc(){
    return new Promise((relove, reject)=>{
        resolve("done")
    })
}

const result = myAsyncFunc(); // Promise
const result2 = myPromiseFunc();// Promise
```

- 위 둘의 결과는 동일하다. 

- async 함수에서의 리턴은, Promise 에서의 resolve 에 해당한다.



### 예외 발생시키기

```javascript
async function myAsyncFunc(){
    throw "myAsyncError" // Uncaught(in promise)
}

function myPromiseFun(){
    return new Promise((relove, reject)=>{
        reject("myPromiseError") // Uncaught(in promise)
    })
}

const result = myAsyncFun();
console.log(result); // Promise {<rejected>: "myAsyncError"} 

const result2 = myPromiseFun();
console.log(result2) // Promise {<rejected>: "myPromiseError"} 
```

- async 에서는 reject 대신, 일반함수에서 쓰는 것과마찬가지로 throw를 던지면 된다. 
- 이 에러를 잡지 않으면 경고메시지로 Uncaught 가 발생하는데, Promise의 catch를 통해서 이 에러를 잡으면 된다. 



### 예외 처리하기

```javascript
async function myAsyncFunc(){
    throw "myAsyncError" // Uncaught(in promise)
}

function myPromiseFun(){
    return new Promise((relove, reject)=>{
        reject("myPromiseError") // Uncaught(in promise)
    })
}

const result = myAsyncFun().catch(e => {
    console.error(e)
});
console.log(result); // Promise {<rejected>: "myAsyncError"} 

const result2 = myPromiseFun(e => {
    console.error(e)
});
console.log(result2) // Promise {<rejected>: "myPromiseError"} 
```

