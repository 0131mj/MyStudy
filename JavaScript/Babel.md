# Babel

- ES2015 문법은 (익스플로러를 비롯한) 구형 브라우저에서 사용할 수 없기 때문에 문법을 변경해줘야 한다. 이때 바벨이란 걸 쓰면, 옛날 자바스크립트 문법 파일로 바꿔준다. 



## babel-cli

- 터미널에서 바벨을 사용할 수 있도록 해주는 프로그램
- npm으로 설치한다.

```shell
npm install --save-dev babel-cli
```



## .babelrc

- 바벨 실행에 관한 설정을 하는 문서파일로서, 바벨이 실행이 되면 이 문서에 적힌 정보에 따라 변환이 된다. 
- 어떤 버전으로 변환할 지에 대한 건 .babelrc 파일의 프리셋항목에 다음과 같이 기재한다. 

```javascript
{
    "presets":["latest"]
}
```



## babel-preset

- 어떤 버전으로 변환을 할거냐는 설정이다. 
- .babelrc에 기재한 프리셋항목은 해당 프리셋이 설치가 되어있어야 사용이 가능하다. 

```shell
npm install babel-preset-env --save-dev	
```



## babel-polyfill

```shell
npm install --save babel-polyfill
```

- 바벨 폴리필은 최신스펙의 문법(함수, 객체)를 쓸 수 있도록 해준다. 



공식 사이트

https://babeljs.io/

