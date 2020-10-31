# Generator

이터레이터이자, 이터러블을 생성하는 함수, 

well-formed iterator 를 리턴한다. 

```javascript
function* counter(){
    yield 1
    yield 2
    yield 3    
}

const g = counter()

console.log(g.next())
console.log(g.next())
console.log(g.next())
console.log(g.next())

/*실행 결과*/
{value: 1, done: false}
{value: 2, done: false}
{value: 3, done: false}
{value: undefined, done: true}
```

- ES6에 추가된 문법으로, 일반적인 함수 정의와 다르게 " * (Asterisk)"를 붙여서 사용한다. 
- 화살표 함수는 사용할 수 없고, 반드시 function * ()형태로 사용한다.
- next()는 제너레이터 객체에 내장된 함수로, yield까지의 부분이 실행되고,  next()를 호출 하는 쪽에 yield의 value와  함수가 끝났는지를 확인하는 정보가 반환됨
- yield 는 iterator 에서 value 에 해당된다.



## 리턴값

```javascript
 function *gen() {
        yield 1;
        yield 2;
        yield 3;
        return 100;
    }
    const iter = gen();
    console.log(iter.next()); // {value:1, done:false}
    console.log(iter.next()); // {value:2, done:false}
    console.log(iter.next()); // {value:3, done:false}
    console.log(iter.next()); // {value:100, done:true}

    for (const a of gen()) console.log(a); //1, 2, 3
```

- 리턴값을 넣을 수 있다. 
- 주의 : 리턴도 제너레이터의 서스펜션 구간에 포함되기는 하지만, 순회에는 포함되지 않는다. 
-  return 100; 을 해주지 않는다면 마지막 서스펜션은 undefined 가 되어 자동으로 done 이 true 로 떨어지게 된다. 



#### 명시적 종료  (return A를 지정)

- return 위치에서 generator를 종료 (done: true)
- value: A 반환



#### 암시적 종료 (return 을 지정해주지 않으면)

- 더이상 진행시킬 yield 가 없을 때 자동으로 generator를 종료 (done: true)
- value : undefined 반환



## Generator Suspension

- function 에 * 가 붙어있으면 내부적인 suspend 구간을 형성한다.
- yield 키워드를 만나면 suspend가 실행되고, next를 호출하면 다시 resume이 일어난다.
- suspend : 멈췄다가 
- resume : 다시 동작



## yield

- yield는 return 과 유사하나, 여러번 실행이 가능하다. 
- yield가 일어날 때 마다 next 다음턴을 준다.



## 결과값

- 제너레이터를 호출한 결과는 iterator 다. 
- yield 가 진행되는 동안은 done 이 false였다가 끝나는 순간 true 가 된다.



## Generator의 특징

- 거의 모든 언어에 구현되어 있다. 
- 제너레이터의 의의는, 나의 일반적일 로직을 기술하고, 자신의 동작을 외부에 위임할 수 있다는 것이다.
- 별도의 쓰레드가 아니다. 
- 제어문을 멈출 수 있다.



### iterable vs 유사 iterable

#### 공통점

- 호출시 iterator (실제루프가 진행되는 영역)를 반환한다. 

#### 차이점

- 호출 방식이 다르다. 
  iterable객체는 iterator메소드를 호출해서 iterator를 받는 반면에,  
  generator 는 함수처럼 그냥 호출하면 iterator를 얻을 수 있다.
- for of... 에는 iterable 이 온다. 
  하지만 제너레이터는 iterable이 아닌, 유사 iterable 이기 때문에 for of 구문에 사용할 수 없다. 
- 팁 : 즉시 실행함수로 감싸서 반영하면 iterator 를 바로 얻을 수도 있다.



## Co Routine

- 여러번 실행한다는 뜻이며, 반대 개념은 Single Routine
- 코루틴은 언어마다 지원하는 방식이 다르며, 자바스크립트에서는 코루틴을 제너레이터를 통해서 실행한다.
- ES6 이후로 자바스크립트 엔진에서는 코루틴을 지원하기 위해, 작성된 모든 statement 를 "레코드 record" 라는 형태의 객체로 감싸서 메모리에 저장한다. 
- 문은 원래 중간에 멈출 방법이 없는데, 문인데도 불구하고 서스펜션을 지원하는 스펙이 있다면, yield 를 통해 멈출 수 있다.
- 제너레이터를 쓰는 목적은, next()를 통해 자신의 제어로직을 외부로 위임하는 데 있다.  제어는, 바깥에서.

```javascript
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<button id="btn">START</button>
<script>
    let isStopped = true;
    let state = "ready";

    const promise = (seq) => {
        return (
            new Promise((resolve, reject) => {
                setTimeout(() => {
                    if (isStopped) {
                        reject({
                            seq,
                            result: false,
                        })
                    } else {
                        resolve({
                            seq,
                            result: true,
                        });
                    }
                }, 300)
            })
        )
    }


    const arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // (async ()=>{
    //     for (const item of arr) {
    //         const result = await test(item);
    //         console.log(result);
    //     }
    // })();

    function* loop(arr) {
        for (const item of arr) {
            yield promise(item)
        }
    }

    let generator = loop(arr);

    let currState = null;

    const go = () => {
        currState = generator.next();
        // if (!currState) {
        // }
        const {done, value} = currState;
        if (!isStopped) {
            if (done) {
                console.log("done");
                btn.innerText = "DONE";
                btn.setAttribute("disabled", "true")
            } else {
                value.then(result => {
                    console.log(result);
                    go();
                }).catch(data => {
                    // console.log("Stop on : ", data);
                    currState = data;
                })
            }
        }
    }

    const btn = document.getElementById("btn");
    btn.addEventListener("click", () => {
        if (!isStopped) {
            isStopped = true;
            console.log("%cStopped !!", "color:crimson; background-color:yellow")
            btn.innerText = "RESTART";
        } else {
            isStopped = false;
            console.log(currState === null ? "Started !!" : "ReStarted !!")
            btn.innerText = "STOP";
            if (currState) {
                generator = loop(arr.slice(currState.seq - 1, arr.length))
            }
            go();
        }
    })
</script>
</body>
</html>
```
