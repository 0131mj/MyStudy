# Next.js

리액트 + (익스프레스 비슷한)백엔드로 구성되어 있음

(이 문서는 13버전을 기준으로 작성됨)

프레임워크라서 편리하기는 한데, 일단 넥스트 만의 쓰잘데기 없는 규칙(폴더 구조, 예약어 등)이 많아 익숙해지기 쉽지 않다.  





설치 

```shell
npx create-next-app@latest
```

실행

```shell
yarn dev
```

### 엔트리포인트

/src/app/layout.tsx

이 파일 안에 <html ></html>껍데기가 들어있다. 



/src/app/page.tsx

그리고 page.tsx 에 보면 



### 라우터 구성

12버전 이전 : page 라우터

13버전 이후 : app 라우터 기반

/app 폴더 내부에 있는 폴더 내부에 있는 page.tsx 파일을 라우팅하도록 강제한다. 





### 빌드

package.json 에 정의된 명령에 따라 수행하면

```shell
yarn build
```

.next 폴더 아래에 빌드된 파일이 생성된다. 



### 배포

yarn start





### PM2로 배포하기



### 메타데이터

title 값 같은 걸 바꾸고 싶을 땐 예약어를 사용해야 한다. 

layout.js에 변수이름을 metadata로 만들어두고, 이를 익스포트하는 걸 악속으로 정한다. 







---





### 12버전 이전

루트폴더에 _app.js 라고 미리 정의된 파일은 앱 전체에 공통으로 적용할 사항을 기술시켜준다. 

예를 들어 공통 레이아웃, 또는 공통 스타일 들을 정의해둘 수 있다.

내용은 아래의 기본 구성을 변경해서 사용하면 된다. 

```react
export default function MyApp({ Component, pageProps }) {
  return <Component {...pageProps} />
}        
```

(주의할 점 : _app.js를 새로 생성했을 때는 서버를 재시작 해야 함.)

## Sass 사용하기

1. yarn add 를 명령어로 sass를 의존성모듈로 추가한다. (글로벌로 설치되어있더라도 설치해줘야 함)
   
   ```bash
   yarn add sass
   ```

2. 루트 디렉토리의 next.confing.js 에 아래와 같은 코드를 집어 넣어준다. 

```javascript
const path = require('path')

module.exports = {
  sassOptions: {
    includePaths: [path.join(__dirname, 'styles')],
  },
}
```

3. 이제 _app.js에서 해당 경로의 scss를 불러오기만 하면 스타일이 적용된다. 

## Head

head 태그를 설정한다. 

주의할 점은, _document 에서 사용하는 Head 와 실제 페이지에서 사용하는 Head 가 다른 경로에 있는 서로 다른 컴포넌트라는 것이다.