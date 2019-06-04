# React Router



## 리액트 라우터를 쓰는 목적

- 여러 페이지를 만들때 필요함.





## v4 새로운 개념

1. 모든것은 component
2. location
3. <Match/> turns a location into UI

react-router-dom도 함께 설치해야 한다. 



## 주요 컴포넌트 및 파라미터

### Router

주소와 매칭해주는 컴포넌트 



#### 파라미터

- path : 입력받을 문자열주소
  - url파라미터 : 아래 코드에서 username에 파라미터를 넣으면 About컴포넌트에서 match라는 props를 받아서 사용가능하다. 

- exact : 정확하게 이 주소로 이동해야 함. 

- component : 주소를 입력했을 때 보여줄 컴포넌트



```javascript
<Router>
  <Route path='/' Component={Home} />
  <Route path='/about/:username/:name' Component={About} />
</Router>  
```

```javascript
const About = ({match})=> {
  return <div>{match.params.username}</div>
}
```


### Link

앵커태그와 비슷함.  페이지를 고치는 대신 연결만 해줌


#### 파라미터

- to : 어디로 이동할거냐



### NavLink

링크에 따라서 새로운 스타일을 적용하고 싶을 때 사용 (active style)

```javascript
<NavLink exact to="/" activeClassName="active">홈</NavLink>
```


### Redirect

조건에 따라 Redirect를 실행해준다. 

```javascript
import {Redirect} from 'react-router-dom';

const logged = false;

const MyPage = () => {
  return (
    <div>
      {
        !logged && <Redirect to "/login"/>
      }
      마이페이지
    </div>
  )
}
```

### history
Route 된 컴포넌트가 받는 3개의 Props(match, location, history) 중에서  history.push 라는 함수가 있다. 

```javascript

const MyPage = ({history}) => {
  return (
    <div>
      <button onClick={()=>{history.push('/posts')}}>
        포스트로 가기
      </button>
    </div>
  )
}
```

### Switch

- 가장 처음에 매칭되는 것만 보여줌
- 주로 404 페이지 같은걸 만들때 사용한다. 

```javascript
<Router>
  <Switch>
    <Route exact path='/' Component={Home} />
    <Route path='/about/:username/:name' Component={About} />
    <Route Component={NoMatch} />
  </Switch>    
</Router>  
```

