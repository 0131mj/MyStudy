# 핵심 React



## 후딱 만들기

페이스북에서 제공하는 리액트 스타트킷으로 빠르게 리액트 프로젝트를 생성시켜준다.

딱 세 줄만 쓰면 리액트 프로젝트를 생성하고, 볼 수 있다. 

```shell
create-react-app myproject
cd myproject
npm start
```



## 고치기

파일을 열어보면 요런 식으로 구성이 되어있음.

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



## 렌더링 구조

Component -> render -> return -> JSX

```jsx
class App extends Component {
  render() {
    return (
      <div className="App">
       Hello,world
      </div>
    );
  }
}
```



## props

리액트에서는 부모 컴포넌트에서자식 컴포넌트로 프로퍼티를 전달할 수 있다. 



부모 컴포넌트에서 전달 : key = {value}

```jsx
 <Child mytext={"text"}/>
```



자식 컴포넌트에서 받기 : {this.props.key}

```jsx
 <p>{this.props.mytext}<p/>
```

