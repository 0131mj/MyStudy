# http

```javascript
const http = require('http');
```

- http 모듈이 해당 파일을 서버프로그램으로 만들어준다. 
- node.js에서 이 프로그램을 돌리면 서버가 돌아간다. 
- 노드는 서버가 아니라 런타임이며, http 모듈이 서버의 역할을 한다. 



```javascript
http.createServer((req, res) => {
    console.log('서버 실행')
}).listen(8080, ()=> {
    console.log("8080포트에서 서버 대기중입니다.")
})
```

- 다른 이벤트들이 '이벤트명', '콜백' 으로 구성되는 것과 달리,
- http는 '방문'이라는 기본 이벤트가 있기 때문에 이벤트는 기재하지 않고 콜백만 기재한다. 





## 포트

- https 는 443,
- http 는 80이 기본포트이다. 



- Well-known 포트 (80,443)는 생략이 가능하다. 즉, naver.com:443은 naver.com과 같다. 
- Well-known 포트가 아니면 포트번호를 붙여줘야 한다.





## 응답

- res.write 는 응답을 html 로 보내주는 것이다. 
- res.end : 종료 