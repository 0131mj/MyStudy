# cookie

서버에서 클라이언트로 데이터를 보내는 가장 간단한 방법이 쿠키이다. 

## Cookie

STEP 1. 서버 => 클라이언트 쿠키 심기

서버에서 클라이언트 쪽으로 전송하는 데이터에서 cookie를 세팅할때, Set-Cookie 를 실행하면, reponse 메시지에 쿠키값이 실려서 보내진다. 

```js
http.createServer(function (req, res){
	res.writeHead(200, {
        'Set-Cookie': ["yummy_cookie=choco", "tasty_cookie=strawberry"]
    });
    res.end("cookie!");
}).listen(3000);
```

웹브라우저 인스펙터로 확인을 해보면 클라이언트가 서버에 접속하면, Response Header 에 쿠키값이 실려서 간다. 



STEP2.  클라이언트 => 서버  요청 전송

쿠키값을 한번 심어놓으면, 다음번 요청부터는 쿠키를 물고 전송을 보낸다.



## 쿠키에 있는 Session id (로그인 정보)

크롬 브라우저 개발자도구의 Application 탭을 열어보면 로그인 한 세션아이디가 기록이 되어있다. (세션아이디의 이름은 브라우저 마다 다름)

!!! 이 세션아이디를 그대로 다른 브라우저에서 열어보면, 로그인이 되어버린다. 



## Permanent Cookie  VS SessionCookie

유효기간이 있는 쿠키와 없는 쿠키

별도의 기간을 정해주지 않으면 세션쿠키가 되며, 세션쿠키는 세션이 만료됨(브라우저 창이 닫힘)과 동시에 없어진다.  



## Secure Http Only

Http Only  로 된 값은 자바스크립트에서 읽을 수 없다. 즉 콘솔에 찍어봐도 안나온다

Secure 로 지정된 값은 https 와 같이 인증된 사이트에서만 보낼 수 있다. 





## 보안을 위한 키워드 : hash, salt, key stretching





## PM2, Forever : 싱글스레드인 Node js 가 뻗었을 때 되살려주는 도구



## 쿠키에 접근하기

#### 헤더에 입력하기

```javascript
res.writeHead(200, {'Set-Cookie': 'mycookie=test'})
```





#### 쿠키 읽어들이기

```javascript
const server = http.createServer((req, res)=> {
	console.log(req.headers.cookie)
})
```



#### 쿠키 파싱하기

- 일반 문자열을 객체형태로 변환해준다.

```javascript
const parseCookies = (cookie = '') =>
    cookie
        .split(';')
        .map(v => v.split('='))
        .map(([k, ...vs]) => [k, vs.join('=')])
        .reduce((acc, [k, v]) => {
            acc[k.trim()] = decodeURIComponent(v);
            return acc;
        }, {});
```

