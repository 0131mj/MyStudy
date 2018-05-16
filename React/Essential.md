# 핵심 React



## 고치기

생성된 프로젝트를 열어보면 파일이 요런 식으로 구성이 되어있음.

- public 폴더 
  - index.html : root 컴포넌트가 정의되어 있고, 그 안에 App컴포넌트가 있음.
  - manifest.json : 프로젝트 설정정보
- src 폴더
  - index.js : 실행파일
  - App.js : App컴포넌트 정의



index.html에서 App.js에 정의된 App 컴포넌트를 갖다쓰고 있으므로, App컴포넌트를 수정하면 화면자체가 바뀐다. 



## 어째서 index.js가 진입 실행 파일이 되는가?

- 답은 package.jsom 파일에 있다.  npm start 를 하고나면 react-script에 있는 start를 찾아간다. 여기서 수번을 반복하면 결국 index.js가 될 수 있다.

```json
"scripts": {
    "start": "react-scripts start",
    "build": "react-scripts build",
    "test": "react-scripts test --env=jsdom",
    "eject": "react-scripts eject"
  }
```





## import, export

```javascript
import React, { Component } from 'react';
```

import 문들 써서 필요한 요소를 끌어다 쓴다. 
