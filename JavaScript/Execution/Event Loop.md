# Event Loop

이 글은Jake Archibald: 루프 속 - JSConf.Asia 라는  youtube 영상을 보고 정리한 글이다.

원본 : https://www.youtube.com/watch?v=cCOL7MC4Pl0



(아직 정리중)

- Main Thread
  - 관할
    - JavaScript
    - Rendering
    - DOM
  - 작동 방식
    - 웹의 상당 부분엔 명확한 순서가 있어서 경쟁 상태가 발생하지 않는다.
    - 하지만 메인 스레드 작동에 시간이 오래 걸린다면, 렌더링이나 상호작용 인터랙션이 느려져 눈에 띄게 된다.
    - 물론 메인스레드 외에 다른스레드로 네트워킹, 암호화감시 인풋장치등도 실행이 끝나면 메인스레드로 돌아온다.
  - 메인 스레드 유지 방법
    - 병목현상을 피하기 위해 JavaScript 가 있는 스레드에서 콜백을 호출하게 한다.
      - 클릭이벤트, 
      - fetch
      - 작업(Task Queue)이 큐되고, 페이지에서 워커로 작업이 다시 큐 된다. 
- Task Queues
  - 이벤트 루프의 가장 오래된 부분
  - Task 를 Queue 하게 되면 
    - 이벤트루프는 새로운 경로를 만든다.
  - 브라우저가 이벤트루프에 작업을 지시하면 
    - 이벤트루프가 목록에 추가했다가 시간이 나면 한다.
  - 예를 들어 setTimeOut 두개가 작업에 추가되면, 
    - 이벤트큐가 돌면서 하나씩 수행한다.
- Render Steps
  - 렌더링은 또다른 경로이다.
- requestAnimationFrame