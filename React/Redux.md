# Redux

리덕스는 어플리케이션의 클라이언트 쪽 state를 관리하기 위한 거대한 이벤트 루프이다.



## Flux와 Redux의 차이점

- Redux에는 Dispatcher가 없다. 



## 리덕스의 3대 핵심개념

- Store
- Action
- Reducers



비유에 의하면 Store는 농구 골대, Action은 농구공,  Reducer는 선수의 역할을 한다고 한다. 



### 스토어 Store

- 스토어는 커다란 하나의 state, 객체 덩어리이다.
- 객체의 key는 Application의 상태 값이고, value는 상태에 연관된 값이다. 
- 애플리케이션 전체에는 단 한개의 스토어만 존재한다. 
- 자체적으로 스토어의 state를 바꿀 수 없고 reducer로 바꾼다. 



### 리듀서 Reducer

- 스토어의 state를 변경해주기 위해서 사용하는 순수함수이다. 
- 이벤트에 대한 반응을 나타낸다. 



### 액션 Action

- action객체는 type과 payload를 속성으로 갖는다.
- 단순객체인 action을 dispatch에  넣어주면 액션 이벤트가 발생한다. 



---



## [ 참고한 블로그  ] 

리덕스에 대한 이해

https://github.com/FEDevelopers/tech.description/wiki/%EB%A6%AC%EB%8D%95%EC%8A%A4%EC%97%90-%EB%8C%80%ED%95%9C-%EC%9D%B4%ED%95%B4



리덕스(Redux)란 무엇인가?

https://voidsatisfaction.github.io/2017/02/24/what-is-redux/