# url

- 주소는 여러가지 값으로 이루어져있다. 

```javascript
const url = require('url');
const URL = url.URL;
const myURL = new URL("https://www.google.com/search?q=%EA%B3%A0%EA%B5%AC%EB%A7%88&rlz=1C1CHZL_koKR756KR756&oq=%EA%B3%A0%EA%B5%AC%EB%A7%88&aqs=chrome..69i57.2421j0j1&sourceid=chrome&ie=UTF-8");
console.log(myURL);
```

- URL 객체에는 host, port, search 등 여러 값이 들어있다. 