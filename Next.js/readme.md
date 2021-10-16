# Next.js



## _app.js

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