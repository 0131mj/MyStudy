# queryString

주어진 요청의 query string 에 따른 정보를 보여주기 위한 페이지

```javascript
var http = require('http');
var url = require('url');

var app = http.createServer(function (request, response) {
    var _url = request.url;
    var queryData = url.parse(_url, true).query;
    console.log(queryData.name);
    if (_url == '/') {
        _url = 'index.html';
    }
    if (_url == '/favicon.ico') {
        return response.writeHead(404);
    }
    response.writeHead(200);
    response.end(queryData.name);
});
app.listen(3000);
```

예를 들어 localhost:3000/id=1 이라는 페이지를 요청하면, 서버는 1이라는 텍스트를 화면에 출력한다.