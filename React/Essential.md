# 핵심 React



## 초기 상태

create react app을 사용해서만든 프로젝트를 열어보면, 여러 파일이 있는데 핵심파일은 아래 3개다. 

1. public/index.html(최종 렌더링 지점) : <div id="root"></div>라는 단 하나의 엘리먼트가 있다.
2. src/index.js (렌더링을 연결해주는 역할) : <div id="root"></div>에 App.js로부터 import 한 <App></App>를 렌더링한다.
3. src/App.js (렌더링에 사용될 대상) : <div id="root"></div>에 사용할 <App></App>컴포넌트가 정의되어 있다.



## 프로젝트 수정하기

초기 상태는 리액트 프로젝트의 기본적인 구조가 잡혀 있다. 잘 보고 따라 만들면 된다.
애플리케이션을 새롭게 구성하려면 src/App.js 처럼  src/MyComp.js 이렇게 만들면 되겠지? 

이렇게 만든 MyComp는 index.js에서 바로 불러서 쓰는 것이 아니라, App.js에서 불러와서 쓴다. 
즉, index.js에서 App.js를 불러오고, App.js에서는 다시 MyComponent.js를 불러오는 것이다.  



## 내보내기 export



## 불러오기 import

```react
import React, { Component } from 'react';
import './App.css';
import Movie from './MyComp';
```

import 문을 써서 필요한 요소를 끌어다 쓴다. 

css 같은 건 이름을 그냥 불러오지만, 재사용을 위해서는 이름을 붙여줘야 한다. 

이렇게 이름과 from을 써줘야 아래에서처럼 다시 써먹을 수가 있기 때문이다. 

```react
<MyComp></MyComp>
```





## 어째서 index.js가 진입 실행 파일이 되는가?

- 보통 애플리케이션은 index.html로 파일이 진입되도록 되어있다. (그 이유가 뭔지는 아직 모름) 하지만 리액트에서는 index.js가 진입실행파일이된다. 
- 답은 package.json 파일에 있다.  npm start 를 하고나면 react-script에 있는 start를 찾아간다. 여기서 추적 상태를 계속 따라가다 보면, index.js를 실행하라고 한다.  (추적 경로는 다음에)

```json
"scripts": {
    "start": "react-scripts start",
    "build": "react-scripts build",
    "test": "react-scripts test --env=jsdom",
    "eject": "react-scripts eject"
  }
```

- eject : 설정을 옮겨온다.

## manifest.json : 프로젝트 설정정보





