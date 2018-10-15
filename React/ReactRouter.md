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
  - url파라미터 : 

- exact : 정확하게 이 주소로 이동해야 함. 

- component : 주소를 입력했을 때 보여줄 컴포넌트



```javascript
<Route path='/' Component={Home} />
```



### Link

앵커태그와 비슷함.  페이지를 고치는 대신 연결만 해줌

#### 파라미터

- to : 어디로 이동할거냐



### NavLink

링크에 따라서 새로운 스타일을 적용하고 싶을 때 사용 (active stytle)



### Redirect



### Switch

- 가장 처음에 매칭되는 것만 보여줌

