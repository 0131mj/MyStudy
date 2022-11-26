# .env

dotenv라는 패키지가 있다. 

환경변수에 데이터를 저장해두고 꺼내쓸 수 있는 기능을 제공하는데, 

```
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=k129#1xb34$
DB_PORT=3306
DB_DATABASE=test
```

여기에 DB 접속 관련 정보를 넣어두고 읽어와서 로그인을 하려니까 아무래도 되지 않았다. 

```javascript
const connection = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    database: process.env.DB_DATABASE,
    port: process.env.DB_PORT,
    password: process.env.DB_PASSWORD,
});
```

node js 에서 아무리 연결하려고 해도 에러가 나는 것을 막을수 없었다. 터미널에서 접속할 때는 문제가 없었는데 mysql2 라이브러리 자체의 문제인지, nodejs와는 연결이 되지 않았다. 

별의 별 씨름을 다하다가 password에 평문 텍스트를 넣어보았는데 문제없이 작동했다.
문제가 곳은 비밀번호의 #이 있는 곳이다. createConnection 의 파라미터는 객체형태이므로 문자열을 삽입할때 무조건 따옴표를 넣어야 해서 문제가 안되지만, dotenv는 에디터에서 잘못 기입한지 알아차리지 못한다. 샵(#)은 주석처리가 되므로 뒤에 붙은 문자열들은 읽는 것이 불가능했던 것이다. 

사실 처음에 env 파일을 생성할때, ide가 플러그인을 추천해주긴 했는데 Laravel 관련 플러그인으로 소개되어서 무시하고 지나걌었다....
또 이런일이 생길 것을 미연에 방지하기 위해 .env 파일의 색상을 포매팅해주는 플러그인을 설치했더니 과연, # 뒤쪽은 회색으로 표시가 되었다. 