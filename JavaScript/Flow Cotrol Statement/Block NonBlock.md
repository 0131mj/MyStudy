## Blocking

프로그램은 기본적으로 한번 실행되면 도중에 멈추지 않고 끝까지 실행된다. 

기본적으로 이런 프로그램은 블로킹의 형태를 띄기 쉽다. 



"블로킹"이란 단어는 오해하기 쉽다. 

언뜻 생각에는, "멈추지 않고 흐르기 때문에 블로킹이 없는 것 아니냐"라고 받아들이기 쉬운데, 그것은 잘못된 생각이다.



블로킹은,  어떤 액션이 "이 흐름을 끊는 것"을 말하는 것이 아니라,

순차적인 "하나의 루틴"이, "다음 루틴"을 수행하지 못하도록 CPU를 장악하고 있는 것을 뜻한다. 

"지금 CPU는 내꺼다."라고 순간적으로 붙들어두는 것이 블로킹인 것이다. 



## non blocking 과 blocking 의 기준 : 시간

기본적으로 모든 프로그램은 블로킹인데, non blocking  과 blocking을 가르는 기준은 "시간"이다. 

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

