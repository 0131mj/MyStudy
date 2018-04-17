# 3분만에 앱 만들고 GitHub Page에 배포하기

1. 어플리케이션 생성 : create-react-app

2. GitHub에 동일한 이름의 레포지토리 생성

3. GitHub에 커밋 및 푸쉬 : push origin master

4. install —save gh-pages

   ​

## 1. 프로젝트 생성 : create-react-app

페이스북에서 제공하는 리액트 스타트킷으로 빠르게 리액트 프로젝트를 생성시켜준다.

설치 후, 딱 세 줄만 쓰면 리액트 프로젝트를 생성하고, 볼 수 있다. 

```shell
install -g create-react-app
create-react-app myproject
cd myproject
npm start
```



## 2. GitHub에 동일한 이름의 레포지토리 생성

```html
https://myid.github.io/myproject
```



## 3. GitHub에 커밋 및 푸쉬

```bash
git init
git commit -am "initial commit"
remote add origin https://github.com/myid/myproject.git
push origin master
```



## 4. gh-pages 설치

```shell
npm install --save gh-pages
```

save를 붙여주면 package.json에 자동으로 dependancies에 추가됨.



## 5. package.json파일을 열고, scripts에 아래 두줄을 추가해준다.

```javascript
"homepage" : "https://myid.github.io/myproject",    
"scripts" :{
	"predeploy" : "npm run build",
	"deploy" : "gh-pages -d build"
}
```



## 6. 디플로이 및 프로젝트 확인

```shell
npm run deploy
```

페이지로 접근해서 확인 해본다. 