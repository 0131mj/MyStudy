# global

- node js 에는 window 가 없는 대신 global이 전역객체로 쓰인다. 
  (크롬에는 globalThis 같은게 있기도 하다.)
- global은 생략이 가능하다. 
- setTimeout 등의 함수를 포함하고 있다. 
- global.setTimeout 이런 식으로 쓴다. 



## timer



### setTimeout



### setInterval

- clearInterval 로 해제 



### setImmediate

- 쓰는 이유: 이벤트루프로 보내서 비동기로 실행순서를 조작하기 위함
- setTimeout 0 과 똑같다.
- 그런데 바로 실행되는데 어떻게 취소를 하는지?