## 리덕스



## 리덕스의 3대 핵심개념

- Store
- Action
- Reducers



비유에 의하면 Store는 농구 골대, Action은 농구공,  Reducer는 선수의 역할을 한다고 한다. 



### 스토어 Store

- 스토어는 커다란 하나의 state이다.
- 애플리케이션 전체에는 단 한개의 스토어만 존재한다. 
- 자체적으로 스토어의 state를 바꿀 수 없고 reducer로 바꾼다. 



### 리듀서 Reducer

- 스토어의 state를 변경해주기 위해서 사용하는 순수함수이다. 



### 액션 Action

- 단순객체인 action이 있고,
- action 이벤트가 있다. 
- 단순객체인 action을 dispatch에  넣어주면 액션 이벤트가 발생한다. 



---



참고한 블로그 

https://github.com/FEDevelopers/tech.description/wiki/%EB%A6%AC%EB%8D%95%EC%8A%A4%EC%97%90-%EB%8C%80%ED%95%9C-%EC%9D%B4%ED%95%B4