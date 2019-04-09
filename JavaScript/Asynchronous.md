# Asynchronous - 비동기



### 동기 vs 비동기

- 동기 : 코드가 위에서부터 한 줄씩 순서대로 실행됨 
- 비동기 : 코드의 순서대로 실행되지 않는 코드를 의미하며, 언제 실행될지 모른다. 
  (콜백함수는 비동기에 해당한다)



한마디로 비동기란, 함수가 순차적으로 실행되다가, '어, 그건 나중에 할게' 하고 넘어가버리고 콜스택에 쌓아두었다가, 일이 끝나면 나중에서야 다시 아까 쌓아둔 함수를 실행하는 로직이다.



## async, await



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





### 예외처리 

```javascript
async () => {
    try{
        
    }catch{
        
    }
}
```

- async 문에서는 promise 와 같이. then, then, catch 이렇게 이어지는 패턴을 사용할 수는 없다