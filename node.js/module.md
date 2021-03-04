# module



```js
module.exports = {
    odd, even
}
```

위의 코드는 아래처럼 쓸 수 있다. 



```javascript
exports.odd = odd;
exports.even = even;
```





## 내장 모듈



### OS 모듈

```javascript
const os = require('os')
```

#### os.cpus()

- os.cpus() 라는 내장함수는 컴퓨터의 cpu정보를 알려주는 함수이다.
- 이걸로 cpu 개수를 알 수 있으며, 주로 웹개발 보다는 데스크탑을 개발할때 확인할 수 있다. 
- 노드는 싱글그레드라서 하나의 코어밖에 쓰지 않는데, 코어의 개수만큼 노드 프로세스를 만들어서 
- 컴퓨터에 몇개의 싱글스레드를 반복문으로 돌려서 멀티프로세싱 할 수 있게 한다. 





### path 모듈

```javascript
const path = require('path');
```

#### path.parse()

- 주소를 파싱한다.
- 웹사이트 공격을 막기 위해 사용가능하다. 예를 들어 상대경로 ('../')가 포함된 값이 들어왔을때 여기서 주소를 떼내어 버릴 수 있다. 

```javascript
const filteredURL = (str) => path.parse(str).base; // '../password' => 'password'
```

