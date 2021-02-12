# file

```javascript
const fs = require('fs');
```



readFile

- 파일은 기본적으로 비동기로 읽힌다. 



readFileSync : 

- 파일을 동기식으로 읽게 처리한다. 
- 콜백을 사용하는 대신, 값을 바로 리턴 받도록 한다. 
- 하지만 거의 사용되는 일은 없는데, 이 방식은 블로킹이기 때문이다.