# Timer



## setTimeout(callback, delay)

```javascript
const helloT = setTimeout(console.log, 1000, "hello");
console.log(helloT); //1
clearTimeout(helloT);
```

- 이 함수는 즉시 실행되는 것이 아니라 다른 방식으로 동작한다. 
- 타임아웃, 즉 시간을 제외시킨다.  즉 지연시간이 발생한다.
- 이것은 최소 지연시간일 뿐, 그 시간바로 후에 이벤트가 일어날 것을 보장해주지는 않는다.
- 변수에 담으면 setTimeout 이 갖고 있는 인덱스를 리턴해준다.
- 이 인덱스를 사용해서 clearTimeout을 수행할 수 있다.



## setInterval(callback, interval)

```javascript
const helloT = setInterval(console.log, 1000, "hello");
console.log(helloT); //1
clearInterval(helloT);
```

- 주의) interval이 1초보다 짧을 경우, chrome 브라우저에서 탭을 벗어나면 interval을 1초로 강제로 변경해버린다.



## requestAnimationFrame(callback)

```javascript
let start;
let stopId;
let progress;
let toggle = false;

const element = documetn.getElementById('element');

function step(timestamp){
    if(!start || progress > 400) start = timestamp;
    progress = (timestamp - start)/ 10 + 50;
    element.style.top = progress + 'px';
    stopId = window.requestAnimationFrame(step);
}

function toggleAnimation(){
    if(!toggle){
        toggle = true;
        window.requestAnimationFrame(step);
    }else{
        toggle = false;
        cancelAnimationFrame(stopId);
    }
}

cancelAnimationFrame(stopId);
```

- 브라우저가 repaint 되기 전에 호출된다.
- 일반 setInterval로도 구현이 가능하지만, requestAnimationFrame 은애니메이션에 더 최적화되어있다. 
- setInterval 은 별도 thread 의 타이머로 움직이지만, requestAnimationFrame은 엔진워크에서 렌더링이 끝나면 엔진이 직접 발생시킨다.
- CPU에 최적화되어 있기 때문에 탭이 이동되면  수행하지 않는다. 
- 비동기적으로 수행되므로 무한재귀가 발생하지 않는다.
- cancelAnimationFrame(stopId) 로 실행을 취소할 수 있다. 