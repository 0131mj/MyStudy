## Blocking

프로그램은 기본적으로 한번 실행되면 도중에 멈추지 않고 끝까지 실행된다. 

기본적으로 이런 프로그램은 블로킹의 형태를 띄기 쉽다. 



*오해금지

우리가 흔히 "블락 당했다." 라는 식의 표현을 쓰는데, 이 때의 '블락 당했다'의 블락과 블로킹은 전혀 다르다. 

'블락당했다'에서의 블락은  '차단', '장애', '제약' 의 뜻을 갖고 있다. 

하지만 Flow Control 에서의 블로킹은 '장악' 으로 해석해야 한다. 



블로킹은,  어떤 액션이 "이 흐름을 끊는 것"을 말하는 것이 아니라,

순차적인 "하나의 루틴"이, "다음 루틴"을 수행하지 못하도록 CPU를 장악하고 있는 것을 뜻한다. 

"지금 CPU는 내꺼다."라고 순간적으로 붙들어두는 것이 블로킹인 것이다. 



#### Blocking 이 되면 무슨 일이 발생하는가?

- Sync Flow가 실행되는 동안 다른 일을 할 수 없는 현상



#### Blocking 을 어떻게 해결하는가?

- sync Flow 를 짧게 한다. 
- 다른 쓰레드에 syncflow를 떠넘긴다.
  - 메인 쓰레드가 아닌 곳으로 위임하고, 메인쓰레드는 여유롭게 둔다.
  - 다른 쓰레드의 작업이 완료 되면 원래 쓰레드에 보고해야 함.





## Non Blocking



## non blocking 과 blocking 의 기준 : 시간

- 기본적으로 모든 프로그램은 Blocking 이다. 실행되는 순간에는 끼어들 수가 없기 때문이다. 
- Non blocking  과 blocking을 가르는 기준은 "시간"이다. 
- Sync Flow 가 납득할만한 시간 내에 종료된다면, 이를 Non Blocking으로 판단해준다. 

- 웹에서의 Blocking 의 시간 제약 : 5초





## blocking function

- 점유하는 시간만큼 블록을 일으키는 함수 : 
- 인자와 상황에 따라서 블로킹에 들어갈 가능성을 내포하고 있는 함수
- 무한루프가 아니더라고 해도, 시스템을 다운시켜버릴 수 있는 안티패턴이다. 

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



### 시분할 운영체제의 동시 실행



### 자바스크립트의 쓰레드

- 사실은 Single Thread 가 아니다. 
  UI에 관련된 처리를 하고, 자바스크립트를 스크립트 처리하는 부분만 Single Thread 임.
- 실제구성
  - Main UI Thread  : 1 개 => 여기가 Single 임.
  - Background Thread  : n
  - Web worker Thread



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

