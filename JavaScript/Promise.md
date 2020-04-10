# Promise





## 개요



### 결과의 처리 in Programing

어떤 작업의 결과를 처리할 경우에, 분기 제어구문을 통해 처리를 한다.

```javascript
const logSuccess = () => console.log("Success")
const logFail = () => console.log("Fail!!")

do(){
    const result = something();    
    if(result){
        logSuccess();
    }else{
        logFail();
    }
}
```

하지만,  something 이 얼마나 걸릴지 모른다면, 비동기로 처리해야 할 필요성이 생긴다.

비동기 함수의 결과는 '성공' 아니면 '실패' 둘 중 하나이다.

Promise는 이러한 비동기를 다루기 위한 장치이다. 



### 결과의 처리 in Promise

Promise 에서는 결과를 처리할 때 쓸 함수를 미리 만들어놓았다. 

- 성공 : resolve

- 실패 : reject



#### resolve 와 reject

```javascript
const executor = (resolve, reject)=> {
    const isSuccess = asyncFunc();
    if (isSuccess === true) {
        resolve(result);
    }else{
        reject(result);
    }
}

const myPromise = new Promise(executor)
```

executor 는 두 가지 인자를 받는다. 

- 첫번째 인자 : 성공했을 때 호출할 함수(resolve), 
- 두번째 인자 : 실패했을 때 호출할 함수(reject)



비동기 작업의 결과에 따라 둘 중 하나를 그대로 이행한다. 

이 resolve, reject 는 Promise 자체에서 제공해주는 특수한 함수이다. (이름은 달라도 된다.)

이것들이 무엇이며, 또 어떤 식으로 동작할지 모르지만, 일단 Promise가 던져주는걸 믿고 쓰는 것이다. 



#### Promise가 하는 일

여러분은 여러분이 하고 싶은 걸 하고, resolve 와 reject 에 실어보내면 된다. 

그러면 다음 프로미스로 연결해주는 것 등은 Promise 가 알아서 해줄터이니, 

그러니까 떠받쳐주는 뗏목같은 것이다. 



사용하는 레벨

연결하는 레벨 : Promise



#### resolve 와 reject 가 하는 일



## resolve

- resolve 는 Promise 를 종료시킨다. 
- resolve 함수가 실행되면,  then 메소드에 등록한 함수가 호출된다.
- resolve(value) 이렇게 넣어주면, then 에서 value를 받아 쓸 수 있다.





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





# 구조

Promise 는 비동기 처리를 위한 장치이다. 

- 상태
- 값
- 그리고 몇가지 메소드들...



## 1. 생성 (선언부)

```javascript
const myPromise = new Promise(실행함수)
```

- Promise 는 리터럴로 만드는 것이 아니라, 내장된 생성자를 사용해서 만들어야 한다. 



### 실행함수

- 성공함수와 실패함수를 하나씩 받아서 이행하는 함수다. 
- 선언과 동시에 실행되지만, resolve 를 바로 수행하지는 않는다.
- 실행함수는 반환값이 없다.

```javascript
 (res, rej) => {
	res(successVal)
	rej(failVal)
}
```





## Promise 객체

비동기작업을 수행하기 위한 객체

```javascript
new Promise((resolve, reject) =>{
    resolve();
    reject();
})
```

- 매개변수 : 실행함수("resolve 와 reject 를 매개변수로 갖는 콜백함수",)
- 위 생성자코드는 아래의 말과 같다고 보면 된다.

> "지금부터 Promise 객체를 하나 생성할껀데, 
>
> 성공하면 어떻게 할지(resolve), 
>
> 실패하면 어떻게 할지(reject)를 알려줘 "

- .then 과 .catch 는 Promise 객체의 메소드이다. 
- 성공하면 .then , 실패하면 .catch 가 실행된다.


## 





## 2. 사용(결과 수신부)

```javascript
myPromise
    .then((successVal)=>{})
	.catch((failVal)=>{})
```



### Promise 의 결과에 따른 루트

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

- promise 의 결과가 resolve 면(성공하면) 결과가 then으로 넘어가고, 
- promise 의 결과가 reject 면(실패하면) 결과가 catch를 타게 된다. 

- then 안에 나오는 success 는, plus라는 promise 의 리턴값이다.



#### 연속 사용 가능

- then을 연이어서 쓸 수 있다. 



### .then()

약속 (Promise) 을 했다면, 결과를 확인해야 한다. 

Promise 안에는, then 이라는 녀석이 내부적으로 이미 들어있다. 

then 은 Promise 가 resolve 되면 호출된다.



#### 입력값 - 두개의 함수

```javascript
p.then(
    (value) => {
        // 프로미스가 실행되었을 때 호출 (value는 Promise의 resolve 에서 받은 값)
    }, 
    (reason) => {
        // 프로미스가 거부되었을 때 호출  
    } 
)
```

- 성공함수와 실패함수를 하나씩 받는다.
- 실패함수가 없거나, 함수가 아니라 값이 들어있다면 : 마지막 Promise 의 상태를 그대로 물려 받는다.

- then 안에는 함수를 넣게 되는데, 이 함수는, 로 부터 받은 response를 인자로 사용한다. 



#### 리턴값

```javascript
const resultP = p.then((data) => {console.log(data)}) // result  = Promise 객체
resultP.then()

```

- then 은 새로운 promise 를 리턴한다.
- 즉, then의 실행결과는 promise 인 것이다.





### .catch()

- Promise 체이닝의 종결점
- 실패와 연결된다. 





### finally



# Promise 가 수행되는 순서

프로미스가 생성되는 시점에, 이미 = 대입연산자를 통해 코드를 수행한다. 따라서 순서는 이렇다. 

1) Promise 내부의 실행함수 수행 : resolve 혹은 reject 까지 수행하고 결과를 갖고 있음.

2) then 을 호출한 시점에 값을 가져옴 : Promise가 무엇을 수행했느냐에 따라 



Q. 만약, then 을 부른 시점에 Promise가 수행되어있지 않으면 어떻게 하나요?

A : then은 Promise를 부르는 것이 아니라. Promise 에 대기를 걸어놓는 것입니다. 

 내부의 resolve 혹은 reject가 수행되어야  then이 호출됩니다. 





## 상태

- pending : 대기
- settled : 처리됨 - 비가역적
  - fullfilled : 성공
  - recjected : 거부





## Case : 무조건 실패하는, 무조건 성공하는 Promise

```javascript
const successPromise = Promise.resolve("성공");
const failurePromise = Promise.reject("실패");
```

이건 어디다 쓰나요?



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



## .fetch



# Static Methods

프로미스 생성 없이 땡겨서 사용할 수 있는 메소드가 있다. 



## Promise.all()

- 여러 프로미스를 한번에 실행해줄 수 있다. 
- 주의할 점 : 단 하나라도 실패할 경우, catch로 처리

```javascript
Promise.all([Users.findOne(), Users.remove(), Users.update()])
	.then((results) => {})
	.catch((error) => {})
```



---

참고출처 : https://www.youtube.com/watch?v=vgs9Xc8pXgw&list=PLcqDmjxt30RsbFOspFG3EsxMwhFSnGFLw&index=14



## Promise.race()





## Promise.resolve()

- Promise.resolve() 를 사용해서 프로미스 체이닝을 시작할 수도 있다.





## 더 알아보기



#### 유래

Promise 란, 프로그래밍에서 병렬처리를 위해 처음 고안된 패턴으로, 

Python, Java, Scala 등의 언어에도 이 개념이 존재한다. 

( 타 언어에서는 Future, Promise, Delay 와 같은 이름으로 쓰인다. )

JavaScript에서의 Promise는 이 초기 목적에서 '병렬 쓰레드' 만 빼고는 동일하다. 



## callback과 뭐가 그리 다른가?

콜백은, 코드를 그대로 쓰는 반면 Promise 는 비동기적인 상황을 하나의 일급 값으로 응축시킨다. 

```javascript
function add10(a, callback){
    setTimeout(()=> callback(a + 10), 100)
}

function add20(a){
    return new Promise(resolve => setTimeout(()=>resolve(a + 20), 100));
}
```

위의 코드에서 차이점은 add20의 "return" 에 있다. 

변수에 할당되거나, 인자로 전달될 수 있다. 





#### 목적 1. 제어권 취득

프라미스를 쓰는 목적은, "then의 시점을 내가 정하고 싶어서" 라고 봐도된다. 

따라서 Promise에 then이 바로 나온다면, 프라미스로 짜긴 했지만 그냥 콜백이나 다름없이 사용하고 있는거라고 봐도 무방하다. 

Promise의 효력이 발생하는 것은 프로미스를 먼저 만들고, 나중에 그 Promise에 then을 사용하는 케이스이다.



#### 목적 2. callback hell 해결

흔히 Callback 지옥을 해결하기 위한 도구로 알려져 있는데,

가독성이 향상되는 것은 사실이나, callback Depth를 해결하기 위한 목적으로 만들어 진 것은 아니다.

콜백을 사용했을 때 발생할 수 있는 문제점은 depth가 깊다는 것이 아니라, 제어권을 잃어버린다는 것이다.



## 모나드, 합성 관점에서의 Promise

```javascript
const f = a => a + 1;
const g = a => a * 1; 
new Promise(resolve => setTimeout(()=>resolve(2), 1000))
	.then(f)
	.then(g)
	.then(r => log(r)); //3
```

모나드란, 프로그래밍에서 안전한 합성을 위해 쓰이는 기술을 말한다. 

Promise 체이닝은, 안에 들어있는 비동기적 상황이 얼마가 걸리든, then 을 통해 끝까지 코드가 도달할 수 있게 만든다. 