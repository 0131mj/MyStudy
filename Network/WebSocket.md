# WebSocket

```sequence
browser -> server : 'HTTP(핸드쉐이크)'
server -> browser : 'HTTP(응답)'
browser -> server : 'WebSocket'
server -> browser : 'WebSocket'
browser -> server : 'WebSocket'
server -> browser : 'WebSocket'
```



## Socket.io

- 자바스크립트를 사용하여 브라우저의 종류에 상관없이 실시간으로 웹을 구현하도록 한 기술
- Node.js 사용

```shell
npm install socket.io
```

