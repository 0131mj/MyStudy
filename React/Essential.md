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



## Component의 구조

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



## 컴포넌트의 3대 요소

### 1. 상태 (state)

- 컴포넌트 내부에 존재하며, state가 변경되면 render가 다시 실행됨.
- state를 변경할 때는 항상 this.setState를 사용해야 함.

```javascript
state = {
    key : 'val'
}

this.setState({
    key : 'val2'
})
```



### 2. 프로퍼티(props)

리액트에서는 부모 컴포넌트에서자식 컴포넌트로 프로퍼티를 전달할 수 있다. 



부모 컴포넌트에서 전달 : key = {value}

```jsx
 <Child mytext={"text"}/>
```



자식 컴포넌트에서 받기 : {this.props.key}

```jsx
 <p>{this.props.mytext}<p/>
```



### 3. 이벤트(onXXX)



## function Component

```jsx
class MyComp extends Component{
    
}

function MyStatelessComp({param}){
    return (
        <div>{param}</div>
    )
}
```

- Component를 상속받아서 만들어지는 것이 아니라, 함수형태로 작성된다. 
- state가 없고 props만 전달 받는다. 
- 생명주기, render가 없고, return만 존재한다. 




## deploy 과정까지

1. create-react-app으로 어플리케이션 생성 
2. GitHub에 동일한 이름의 레포지토리 제작
3. git초기화 
4. install