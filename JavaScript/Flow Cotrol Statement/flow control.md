# Flow Control



### Sync Flow 

- 메모리에 적재된 명령이 순차적으로 실행됨

- SyncFlow Control : Goto를 통해 명령의 위치를 이동함



## 노이만 머신



## 문과 값 

문 : 엔진이 실행 서술형. 

값 : 실행기를 밖에 둬야 한다. (실행기와 공급기의 쌍으로 이뤄짐). 대상화 시킨것



값 메모리에 할당하는 것으로서, 통제가 가능하고,

실행문은 실행이 종료됨과 동시에 휘발되어 버린다. 



## 지연실행

- 프로그램은 원래 처음부터 끝까지 쉬지 않고 실행된다. 
- 프로그램 실행 도중에, 실행을 미루거나 건너뛸 수 있도록 제어하는 모든 행위를 지연실행이라고 한다. 
- 런타임에 판단되므로,  Lazy라고 볼 수 있다. 





### 1) 호출지연

```javascript
function myFunc(){
    
}
```

- 함수를 호출 하는 것 : 노이만 머신의 흐름과 달리, myFunc는 실행문을 만나기전까지 실행하지 않는다.



### 2) 연산지연

```javascript
const a = b || c;
```

- b가 참이라면 c는 무시된다. 



### 3) 제어문 Flow Control Statement 을 이용한 지연







## Concurrency vs Parallelism

- Concurrency  : 흔히 동시성이라고 번역되지만, 정말 똑같은 시간에 동시에 일어나는 것을 뜻하지는 않는다.

  시분할 컴퓨팅에서 각 프로세스를 왔다리갔다리 하면서 마치 동시에 처리되는 것 같은 효과를 주는 것을 뜻한다.

- Parallelism : 병렬성 - 여러개의 프로세스가 한꺼번에 각자의 플로우 안에서 동시에 일어나는 것, 자바스크립트는 이 방식으로 움직인다.



## 제어 역전

- 제어 역전 : 
- 반 제어 역전 : 



#### 제어역전 사례

흔히 가장 쉽게 생각할 수 있는 루프는 이런 식이다.

```javascript
const working = _ => {}
for (let i = 0; i < 1000; i++) working();
```



블로킹을 없애버린 케이스

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
        console.log(i);
        if (i < max - 1) requestAnimationFrame(f, 0);
    }
    requestAnimationFrame(f, 0);
}

nbFor(100, 10, working)
```



블로킹을 없애고 제너레이터를 통해 바깥으로 컨트롤을 위임한 케이스

```javascript
const working = _ => {}
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
```

