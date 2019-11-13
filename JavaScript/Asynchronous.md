# Asynchronous - 비동기



### 동기 vs 비동기

- 동기 : 코드가 위에서부터 한 줄씩 순서대로 실행됨 
- 비동기 : 코드의 순서대로 실행되지 않는 코드를 의미하며, 언제 실행될지 모른다. 
  (콜백함수는 비동기에 해당한다)



한마디로 비동기란, 함수가 순차적으로 실행되다가, '어, 그건 나중에 할게' 하고 넘어가버리고 콜스택에 쌓아두었다가, 일이 끝나면 나중에서야 다시 아까 쌓아둔 함수를 실행하는 로직이다.



## async, await (with try... catch)

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

function myPromiseFun(){
    return new Promise((relove, reject)=>{
        resolve("done")
    })
}

const result = myAsyncFun();
const result2 = myPromiseFun();
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

