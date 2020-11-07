# Blocking and Non-Blocking



#### 교통체증 유발

프로그램은 여러가지 명령을 순차적으로 실행한다. 

블로킹이란 순차적인 "하나의 루틴"이, "다음 루틴"을 수행하지 못하도록 CPU를 장악하고 있는 것을 뜻한다. 

"지금 CPU는 내꺼다."라고 순간적으로 붙들어두는 것이 블로킹인 것이다. 

방해될 정도로 막아두고 있다면, 이 구간을 블로킹이라고 간주한다. 



> **블로킹**은 Node.js 프로세스에서 추가적인 JavaScript의 실행을 위해 JavaScript가 아닌 작업이 완료될 때까지 기다려야만 하는 상황입니다. 
>
> https://nodejs.org/ko/docs/guides/blocking-vs-non-blocking/



#### 얼마나 오랫동안 붙들어야 블로킹인가?

- 기본적으로 모든 프로그램은 Blocking 이다. 실행되는 순간에는 끼어들 수가 없기 때문이다. 
- Non blocking  과 blocking을 가르는 기준은 "시간"이다. 
- Sync Flow 가 납득할만한 시간 내에 종료된다면, 이를 Non Blocking으로 판단해준다. 

- 웹에서의 Blocking 의 시간 제약 : 5초





## blocking function

- 점유하는 시간만큼 블록을 일으키는 함수 : 
- 인자와 상황에 따라서 블로킹에 들어갈 가능성을 내포하고 있는 함수
- 무한루프가 아니라도, 시스템을 다운시켜버릴 수 있는 안티패턴이다. 

```javascript
const f = v => {
    let i = 0;
    while (i++ < v);
    return i;
};
f(10);
f(10000000000000);
```



## blocking evasion

### 블로킹 사례

- 독점적인 CPU 점유로 인해 모든 동작이 중지됨.
- 타임아웃 체크에 의해  프로그램이 강제 중단됨.



### 블로킹을 피하기 어려운 이유

- 예측불가능성 (로그 조차 찍을 수 없음)



#### Blocking 이 되면 무슨 일이 발생하는가?

- Sync Flow가 실행되는 동안 다른 일을 할 수 없는 현상이 발생한다. 





## Non Blocking

- 뭐 거창한 게 아니라, 블로킹을 피하면 논블로킹이다. 



#### Blocking 을 어떻게 해결하는가?

- sync Flow 를 짧게 한다. 
- 다른 쓰레드에 syncflow를 떠넘긴다.
  - 메인 쓰레드가 아닌 곳으로 위임하고, 메인쓰레드는 여유롭게 둔다.
  - 다른 쓰레드의 작업이 완료 되면 원래 쓰레드에 보고해야 함.



#### Context and Switch

- CPS : 첫번째 할일을 하고 Passing을 시킨다. 
- 남이 프로세스를 쓸수 있도록 한다.



#### Continuation and Resume







### 시분할 운영체제의 동시 실행



### 자바스크립트의 쓰레드

- 사실은 Single Thread 가 아니다. 
  UI에 관련된 처리를 하고, 자바스크립트를 스크립트 처리하는 부분만 Single Thread 임.
- 실제구성
  - Main UI Thread  : 1 개 => 여기가 Single 임.
  - Background Thread  : n
  - Web worker Thread



브라우저 엔진

- 대표적인 일 : 그림그리기, 통신준비, 메모리, 프로세스 초기화 등...
  - 자바스크립트 변수에 영향을 주지 않는 것은 멀티쓰레드로 처리한다.



time slicing manual : 수동으로 타임슬라이스 하기

```javascript
if(true){
    const requestAnimationFrame = _ => {
        console.log(new Date());
    }
    const log = (i) => {
        console.log(i);
    }
    const looper = (n, f, slice = 3) => {
        let limit = 0, i = 0;
        const runner =_=> {
            while(i < n){
                if (limit++ < slice) f(i++);
                else {
                    limit = 0;
                    requestAnimationFrame(runner);
                }
            }
        }
        requestAnimationFrame(runner);
    }

    looper(100, log);
}
```





# Non-blocking 을 구현하는 몇가지 방법

```javascript
const REPEAT = 1000;
let cnt = 0;
let countable = true;
const working = _ => {    
    if(countable){
        console.log("DIDN'T STOP!! : ", cnt += 1)
    }else{
        console.log("STOPPED!!")
    }
    if(cnt === repeat){
        console.log("duration : ", performance.now() - start);
    }
}
```



### 블로킹

```javascript
for (let i = 0; i < REPEAT; i++) working();
```

- 흔히 가장 쉽게 생각할 수 있는 루프는 이런 식이다.
- 가장 빠르다.  거침없이 나아가는 폭주기관차라고 생각할 수 있다. 
- 동적으로 countable 을 false로 만든다고 하더라도, 블로킹 상태이기 때문에 이 코드를 멈출수는 없다. 



### 블로킹을 없애버린 케이스(슬라이스)

```javascript
const working = _ => {}
const nbFor = (max, load, func) => {
    let i = 0;
    const f = time => {
        let curr = load;
        while (curr-- && i < max) {
            func();
            i++;
        }
        if (i < max - 1) requestAnimationFrame(f, 0);
    }
    requestAnimationFrame(f, 0);
}

nbFor(REPEAT, 10, working)
```

- 현재 프로그램을 통째로 장악하지 않고, 10개씩 끊어서 루프를 수행한다. 
- 제어권을 돌려받는다. 
- 하지만 내부적으로 코드를 심어주지 않는다면, 명령 자체를 멈추지는 못한다. 
- nbFor 라는 함수는 자기자신이 제어권한을 갖고 있다. 
- 클로저 변수 사용
- 함수 내부에서 재귀적으로 다시 코드를 수행하는 방식으로 루프 수행
- 내부적으로 requestAnimationFrame을 사용하기 때문에 상대적으로 느리다. 
- 코드를 멈추는 게 가능하나?



### 블로킹을 없애고 제너레이터를 통해 바깥으로 컨트롤을 위임한 케이스

```javascript
const gene = function*(max, load, func){
    let i = 0, curr = load;
    while (i < max) {
        if (curr--) {
            func();
            i++;
        }
        else {
            curr = load;
            console.log(i);
            yield;
        }
    }
}

const nbFor2 = (max, load, func) => {
    const iterator = gene(max, load, block);
    const f =_=> iterator.next().done||timeout(f);
    timeout(f);
}
```

- 지역변수 사용
- 일정한 크기만큼 잘라서 수행하는 것은 똑같지만 함수의 외부에서 제어권을 컨트롤할수 있도록 되었다. 



### 비동기 제어 : 프로미스로 반제어권을 행사하게 한 케이스

```javascript
const gene2 = function*(max, load, func){
    let i = 0;
    while(i<max){
        yield new Promise(res => {
            let curr = load;
            while (curr-- && i < max){
                func();
                i++;
            }
            console.log(i);
            timeout(res, 0);
        })
    }
}

const nbFor3 = (max, load, func) => {
    const iterator = gene2(max, load, func);
    const next =_=> ({value, done}) => done || value.then(v => next(iterator.next()))
    next(iterator.next());
}
```

- 앞전의 케이스와는 반대로 , 내부의 프로미스 자체가 제어권을 갖는다. 