# Asynchronous - 비동기



### 동기 vs 비동기

- 동기 : 코드가 위에서부터 한 줄씩 순서대로 실행됨 
- 비동기 : 코드의 순서대로 실행되지 않는 코드를 의미하며, 언제 실행될지 모른다. 
  (콜백함수는 비동기에 해당한다)



한마디로 비동기란, 함수가 순차적으로 실행되다가, '어, 그건 나중에 할게' 하고 넘어가버리고 콜스택에 쌓아두었다가, 일이 끝나면 나중에서야 다시 아까 쌓아둔 함수를 실행하는 로직이다.



아래 루프는 sync를 1부터 100까지 출력한 후,  async: 100을 100번 출력한다.

```javascript
const limit = 100;
let curr = 0;
while(limit > curr){
    console.log("sync: ", curr)    
    curr+=1;
    setTimeout(()=>{
	    console.log("async: ", curr)
    })
}
// sync: 1
// sync: 2
// ....
// sync: 100
// async: 100
// async: 100
// ...
// async: 100
```







