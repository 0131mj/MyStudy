# cookie

서버에서 클라이언트로 데이터를 보내는 가장 간단한 방법이 쿠키이다. 



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

