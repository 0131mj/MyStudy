# Next.js

리액트 + (익스프레스 비슷한)백엔드로 구성되어 있음

(이 문서는 13버전을 기준으로 작성됨)

프레임워크라서 편리하기는 한데, 일단 넥스트 만의 수많은 규칙(폴더 구조, 예약어 등)이 많다. 넥스트 를 배우는 것은 이런 규칙에 익숙해지는 것이다.

써보면서 느낀 단점 : 

파일 이름이 모두 똑같아서 디버깅이 어렵다. 

규칙들을 암기해야 해서 익숙해지기 어렵다.



### 설치

```shell
npx create-next-app@latest
```

### 실행

```shell
yarn dev
```



### 약속 1. 엔트리포인트

/src/app/layout.tsx

이 파일 안에 <html ></html>껍데기가 들어있다. 

/src/app/page.tsx

그리고 page.tsx 에 보면 



### 약속 2. 라우터 구성

12버전 이전 : page 라우터

13버전 이후 : app 라우터 기반

/app 폴더 내부에 있는 폴더 내부에 있는 page.tsx 파일을 라우팅하도록 강제한다. 



### 약속 3. 세그먼트

- 세그먼트를 받기 위한 구조 : 
  
  - 1. 폴더 이름을 a로 짓는다. 
    
    2. 하위 폴더 이름을 [id]로 짓는다. 
    
    3. 이제 a/id 라는 주소의 세그먼트는 a/[id]/page.tsx에서 props.params.id 라는 값으로 가져올 수 있다. 

### 

### 약속 3. page.tsx 와 layout.tsx 그리고 children

layout.tsx 라는 파일은 children이라는 props를 받아서 내부에서 뿌리도록 되어있는데, 이 children 은 page.tsx 이다. 그렇게 약속되어 있다.  



### 약속 4. 메타데이터

title 값 같은 걸 바꾸고 싶을 땐 예약어를 사용해야 한다.

layout.js에 변수이름을 metadata로 만들어두고, 이를 익스포트하는 걸 악속으로 정한다.



### 싱글페이지

싱글페이지로 잡고 싶다면 해당 페이지에서 a 태그 대신 Link 태그를 쓰면 된다. 



### 정적파일 경로

/public 에 파일을 넣어두고

/ 경로로 파일을 읽어올 수 있다. 



### 서버컴포넌트와 클라이어트 컴포넌트

next.js의 컴포넌트는 서버컴포넌트와 클라이언트 컴포넌트로 나눌 수 있다. 

기본적으로 next.js의 모든 컴포넌트는 서버컴포넌트이다. 

- 서버 컴포넌트(기본)
  
  - 클라이언트 컴포넌트 옵션 사용 불가 (useState 등...)

- 클라이언트 컴포넌트
  
  - 사용해주려면 문서 상단에 "use client"라고 써줘야 됨
  
  - 서버컴포턴트 옵션 사용 불가 (metadata 등...)



### 환경변수

.env.local

```
DB_HOST=localhost
```

가져오기(서버 측)

```javascript
process.env.API_URL
```



가져오기(클라이언트)

NEXT_PUBLIC_API_URL





---



### 빌드

package.json 에 정의된 명령에 따라 수행하면

```shell
yarn build
```

.next 폴더 아래에 빌드된 파일이 생성된다.

### 배포

yarn start

### PM2로 배포하기



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