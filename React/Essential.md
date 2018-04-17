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



## import, export

```javascript
import React, { Component } from 'react';
```

import 문들 써서 필요한 요소를 끌어다 쓴다. 
