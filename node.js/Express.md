# Express

nodejs 의 표준 프레임워크

익스프레스에서 가장 중요한 특징 두가지는 라우터와 미들웨어다.



app.set

익스프레스 설정 또는 값(나중에 사용할 수 있는) 저장



## Router

### res.send()

nodejs

```javascript
const app = http.createServer((req, res)=>{
    res.writeHead(200);
    res.end('result');
})
```

express

writeHead 와 end 를 합쳐셔 send 로 표현 가능하다. 

```javascript
app.get('/', (req, res)=>{
    res.send('result');
})
```

## res.redirect();

nodejs

```javascript
const app = http.createServer((req, res)=>{
    res.writeHead(302, {Location: `/`});
    res.end();
})
```

express

```javascript
app.get('/', (req, res)=>{res.redirect('result')})
```



writeHead를 하고 end를 하는 것은, express 에서 send 만 하는 것과 동일하다. 



## Middleware

### bodyParser

바디를 파싱 해주는 미들웨어

app.post 라는 라우팅 함수에서 사용하는 req 에 body라는 프로퍼티를 만들어 넣어준다. 

익스프레스 최신버전에는 bodyParser가 내장되어 있기 때문에, 아래와 같이 사용할 수 있다. 

```javascript
express.json();
express.urlencoded({extended:false})
```



### helmet

보안관련 여러 처리를 해주는 미들웨어



## express generator

익스프레스의 기본적인 구조를 미리 세팅해놓은 덩어리를 생산해주는 제너레이터

```shell
yarn add express-generator -g
```

설치후에는 아래와 같이 명령어를 사용해 express 프로젝트를 만들어낼 수 있다. 

```shell
express test-app
```

* 패키지 설치 후에 바로 명령어를 사용할 수 없는 경우가 있는데, 터미널을 다시 시작해보자. 
* 3000번포트가 이미 사용중이라고 나온다면, 윈도우에서 node.js 를 종료하고 다시 시작해보자. 