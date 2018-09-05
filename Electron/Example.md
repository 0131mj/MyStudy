# 일렉트론 헬로월드 예제



### 1. 전역에 헬로월드 설치 

```bash
yarn global add electron
```



### 2. 프로젝트 생성하기

```bash
mkdir hello
cd hello
yarn init 
```



### 3. index.js 파일 만들고 렌더러 프로세스 생성하기 

init 할 때 엔트리포인트 파일로 index.js가 지정된다.  index.js 파일을 생성하고 아래와 같이 작성한다. 

```javascript

const {app, BrowserWindow} = require('electron');
// 1) 모듈 불러오기 : app 은 Application 자체를 가리킴. 각종 이벤트를 생성할 수 있음.

let mainWindow; 
// 2) 싱글 윈도우를 사용하기 위한 변수 선언


function onClosed(){
    mainWindow = null;
    // 6) 앱 종료시 디레퍼런스 
}


app.on('ready', ()=>{
    
    mainWindow = new BrowserWindow({
        width: 640,
        height: 480
    });
    // 3) 앱이 레디가 되면, mainWindow라는 녀석에게 브라우저가 생성되도록 함. 
    
    mainWindow.loadURL(`file://${__dirname}/index.html`);
    // 4) 브라우저 생성 후 index.html을 로드해서 보여줌.
   
    mainWindow.on('closed', onClosed);
     // 5) 앱 종료시 함수 실행
    
});
```



### 6. index.html 작성

```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, world!</h1>
</body>
</html>
```



### 7. 앱을 구동하기 위한 스크립트 추가

- package.json 파일을 열고 아래 스크립트를 추가한다. 

```json
{
    ...,
    "scripts":{
    	"start" : "electron ."
	}
}
```



### 8. 콘솔에서 실행하기

```bash
yarn start
```

- hello world 앱이 뜨는 것을 볼 수 있다. 



---

추가작업



이벤트 종류

##### App

- window-all-closed : 윈도우가 모두 닫혔을 때 
- activate : 앱이 실행되었을때
- ready : 앱이 준비되었을때 

##### window

- closed : 윈도우가 닫혔을 때





# 번들링하기 

### electron-packager

```bash
yarn add --dev electron-packager
```

--dev 옵션을 추가하게 되면 package.json파일의 devDependencies에 해당 패키지가 추가된다. 



### 빌드를 위한 스크립트 작성

```json
"build":"electron-packager . --out=dist --asar --overwite --all"
```

