# Redux



리덕스.

리액트와는 직접적인 연관은 없다. 



리덕스는, 리액트에서 데이터를 컴포넌트와 컴포넌트간의 대화가 아니라, 

중앙에서 주고받는 형태로 만들기 위해서 고안되었다. 



리덕스는 자바스크립트 앱을 위한 예측 가능한 상태 컨테이너로

어플리케이션의 클라이언트 쪽 state를 관리하기 위한 거대한 이벤트 루프이다.

하위컴포넌트에서 또 다시 손자 컴포넌트로 데이터를 전달할때의 불편함을 보완하기위해 사용한다.





## Flux와 Redux의 차이점

- Redux에는 Dispatcher가 없다. 



### 리덕스 패턴

```react
View -> Action -> Dispatcher -> Store(Middleware -> Reducer) -> View
```



## Redux 의 기본 원칙

1. 애플리케이션의 모든 상태는 하나의 스토어 안에 하나의 객체 트리 구조로 저장된다. 
2. 상태를 변화 시키는 유일한 방법은 무슨 일이 벌어지는 지를 묘사하는 액션 객체를 전달하는 방법 뿐이다. 
3. 액셔넹 의해 상태 트리가 어떻게 변화하는 지를 지정하기 위해 프로그래머는 순수 리듀서를 작성해야 한다. 



## 리덕스의 3대 핵심개념

- Store
- Action :이벤트, 
- Reducers : 순수함수(이벤트에 대한 반응)



비유에 의하면 Store는 농구 골대, Action은 농구공,  Reducer는 선수의 역할을 한다고 한다. 



### 스토어 Store

- 스토어는 커다란 하나의 state, 객체 덩어리이다.
- 객체의 key는 Application의 상태 값이고, value는 상태에 연관된 값이다. 
- 애플리케이션 전체에는 단 한개의 스토어만 존재한다. 
- 자체적으로 스토어의 state를 바꿀 수 없고 reducer로 바꾼다. 
- 애플리케이션의 상태를 저장하고, 
- getState()를 통해 상태에 접근하게 하고
- subscribe(listner)를 통해 리스너를 등록함
- 만약 데이터를 다루는 로직을 쪼개고 싶다면, 여러개의 스토어 대신 리듀서의 조합이 사용가능하다.



### 리듀서 Reducer

- 스토어의 state를 변경해주기 위해서 사용하는 순수함수이다. 
  - 이전 상태와 액션을 받아서 다음상태를 반환하는 순수함수 이다. 
- 이벤트에 대한 반응을 나타낸다. 

```react
(previousState, action) => newState
```

- 상태에 변화가 생기면, 이전에 컴포넌트가 스토어에게 구독할 때 전달했던 linstner가 호출된다. 



#### 리듀서에서 하지 말아야 할 것

- 인수들을 변경하기
- API 호출이나 라우팅 전환같은 사이드 이펙트 일으키기
- Date.now()나 Math.random() 같은 순수하지 않은 함수를 호출하기



### 액션 Action

- 애플리케이션에서 스토어로 보내는 데이터 묶음. 이들이 스토어의 유일한 정보원이 된다. 
- store.dispatch()를 통해 이들을 보낼 수 있다. 
- action객체는 type과 payload를 속성으로 갖는다.
- 단순객체인 action을 dispatch에  넣어주면 액션 이벤트가 발생한다. 



#### 액션 생산자

- 액션을 만드는 함수





## Redux Saga

리덕스 사가란, 미들웨어의 일종이다. 



#### 미들웨어란?

액션이 디스패치되어서 리듀서에서 이를 처리하기 전에 사전에 지정된 작업들을 설정한다. 

공식문서에 따르면, "미들웨어는 액션을 보내는 순간부터 스토어에 도착하는 순간까지 사이에 서드파티 확장을 할 수 있는 지점을 제공한다", 고 되어 있다. 



리덕스 사가는 ES6에서 도입된 Generator 함수를 기반으로 한다. Generator함수는 yield키워드를 만나면 일단 멈추고, next가 전달되어야 다음 yield키워드까지 코드를 진행시키는데 리덕스 사가는 이 제너레이터 함수의 특징을 활용한다.


Redux connect

---

## recursive : 재귀적인방식사용

재귀로 할때는 제대로 mapDispatchToProps가 먹히지 않는다. 
최상위 노드에만 먹히는데 이럴때는 아래와 같이 컴포넌트와 익스포트되는 이름을 다르게 해주면 된다. 

```react
const TreeNodeBranchWrapper = connect(mapStateToProps, mapDispatchToProps)(TreeNodeBranch);
export default TreeNodeBranchWrapper
```
https://howtoember.wordpress.com/2016/05/18/rendering-recursive-components-in-react-redux/



## lmmutablity : 불변성

리액트는 컴포넌트의 state를 변경할때 무조건 setState를 통해 업데이트 해줘야 한다. 



## [ 참고한 블로그  ] 

리덕스에 대한 이해

https://github.com/FEDevelopers/tech.description/wiki/%EB%A6%AC%EB%8D%95%EC%8A%A4%EC%97%90-%EB%8C%80%ED%95%9C-%EC%9D%B4%ED%95%B4



리덕스(Redux)란 무엇인가?

https://voidsatisfaction.github.io/2017/02/24/what-is-redux/



## immer

불변성을 유지해주는 도구



## hooks

- useDispatch
- useSelector

before

```javascript
const mapStateToProps = (rootState) => ({
    enableSettings: rootState.control.enableSettings
})
```



after

```javascript
const enableSettings = useSelector(state => state.control.enableSettings);
```

