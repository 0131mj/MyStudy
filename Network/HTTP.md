# HTTP

Hyper Text Transfer Protocol 웹 통신 규약

- 웹 브라우저의 요청 :   Request
- 웹 서버의 응답 :  Response
- 크롬 개발자 도구에서 Network 항목을 클릭하면 데이터를 주고 받는 모습을 볼 수 있다. 



## Request message

#### Request Message Header : 

​	- Request Line

​	- Request Headers

##### Request Line : 

```js
Request URL: https://nv.veta.naver.com/fxshow?su=SU10079&nrefreshx=0
```



##### Request Headers

### user agent 

웹브라우저의 다른이름



response code

300 리다이렉션

400 클라이언트 에러

500 서버에러



## HTTP VS HTTPS

- HTTPS는 SSH를 이용하는 것임
- HTTP는 누군가가 정보를 보고 있다는 것임.
- HTTPS가 아닌 곳에서 로그인정보를 요구하면 가입을 하지 않아야 함.



## proxy

- 웹서버와 웹브라우저 사이에 있는 중개서버



## wireshark

- http뿐만 아니라 모든 정보 전송을 관찰할 수 있는 도구



## MIME

- Multipurpose Internet Mail Extention