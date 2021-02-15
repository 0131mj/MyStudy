# event

- 미리 이벤트 리스너를 만들어두고, 
- 이벤트 리스너는 특정 이벤트가 발생했을 때 어떤 동작을 할 지 정의하는 부분
- 예시) 사람들이 서버에 방문(이벤트)하면 HTML 파일을 준다.

```javascript
const EventEmitter = require('events');
const myEvent = new EventEmitter();

myEvent.addListener('방문', ()=> {
	console.log('방문해주셔서 감사합니다.');
//    res.sendfile(html파일)
});
myEvent.on('종료', () => {
	console.log("안녕히가세요"); 
});
myEvent.on('종료', () => {
	console.log("제발 좀 가세요.");
});
myEvent.once('특별이벤트', () => {
	console.log("한 번만 실행됩니다.");
});
myEvent.emit('방문');
myEvent.emit('종료');
myEvent.emit('특별이벤트');
myEvent.emit('특별이벤트');

/** 실행결과
	방문해주셔서 감사합니다.
	안녕히가세요      
	제발 좀 가세요    
	한 번만 실행됩니다
**/
```



## addEventListener

- 이벤트를 추가한다. 



## on

- 이벤트를 추가한다. (addEventListener와 같다.)



## once

- 한 번만 수행하는 이벤트를 정의한다. 



## emit

- 사용자가 정의한 이벤트를 호출한다. (인자: 이벤트 이름)



## removeListener

- 이벤트를 제거한다. 
- 인자 : 이벤트이름, 콜백 (제거를 위해 콜백을 변수에 담아야 한다.)

```javascript
const callback = () => {
    console.log("콜백")
}
myEvent.on('종료1', callback);
myEvent.removeListener('종료', callback);
```

