# 컴포넌트 생명주기

컴포넌트는 크게 3가지의 흐름에 따라 움직인다.

1. Mount
2. Update
3. Unmount



## Mount 

마운트(DOM이 생성되고 웹브라우저 상에 나타나는 단계)에서는 다음 4가지 메서드가 순서대로 호출된다.  

- constructor
- getDerivedStateFromProps
- render
- componentDidMount



### constructor

```react
constructor(props){
    super(props)
}
```

- super는 무엇을 하는가?  자바스크립트의 super는 "부모의 생성자를 호출한다."고 되어있다. 
- 컴포넌트는 Component 를 extends 해서 만들어지는데, 여기서 constructor를 만들어주지 않으면  Component 클래스의 생성자메서드를 그대로 사용한다. 
- 하지만 constructor를 만들어줄 경우, 수동으로 super(props)를 통해 Component의 prop을 사용할 수 있도록 한다.
- 초기 state를 정의하거나 이벤트 핸들러를 바인딩한다.
- Directly overwrite this.state
- 사이드이펙트를 사용할 수 없다. (HTTP request 등)



#### getDerivedStateFromProps()

```react
static getDerivedStateFromProps(nextProps, prevState){
    
}
```

- 컴포넌트가 re-render 될 때마다 호출된다.
- props로 받아온 값을 state로 동기화할때 사용
- 사이드이펙트를 사용할 수 없다. (HTTP request 등)



#### render()

- 컴포넌트의 유일한 필수 메서드.
- 이 안에서는 state를 변경해서는 안된다. 
- 이 안에서는 웹브라우저 안에 접근할 수 없다. 
- (변경 및 웹브라우저의 접근은 componentDidMount 를 사용한다.)
- ajax call을 하면 안된다.
- Children components lifecycle methods are also executed.



#### componentDidMount

- 컴포넌트를 만들고, 첫 렌더링을 다 마친후 실행된다. 

- 다른 자바스크립트 라이브러리의 함수 호출, setTimeout, setInterval, 네트워크 요청 같은 비동기 작업 처리 수행

- 자식컴포넌트가 있다면, 자식컴포넌트레벨에서의 componentDidMount 까지가 먼저 실행되고, 부모의 componentDidMount 가 실행된다. 

  ```react
  <Parent> // 2)ComponentDidMount
      Parent
      <Child>Child</Child> // 1)ComponentDidMount
  </Parent>
  ```



## Update

컴포넌트가 업데이트되는 경우는 총 네가지이다. 

1. props 가 바뀜
2. state 가 바뀜
3. 부모 컴포넌트 리렌더링
4. forceUpdate





#### shouldComponentUpdate

- 리액트에서는 부모의 상태가 바뀌면 자식의 상태도 렌더링을 기본적으로 해주게 되어있다.
- 성능을 최적화 하기위해 사용할 수 있다. state를 바꿨음에도 불고하고 렌더링을 하지 않도록 하고 싶다면 이 주기를 false로 만들면 된다. 
- virtual DOM에 나타나게 할지 말지를 결정해주는 함수라고 할 수 있다. 
- setState를 사용할 수 없다. 
- 사이드이펙트를 사용할 수 없다. (HTTP request 등)



#### getSnapshotBeforeUpdate

- 렌더링을 하고난 후, 화면에 그리기 바로 직전에 생긴다.
- render -> **getSnapshotBeforeUpdate** -> 화면에 반영
- 주로 스크롤의 위치, 크기 등을 설정해주기 위해 사용한다. 



#### componentDidUpdate(prevProps, prevState, snapshot)

- 리렌더링을 완료한 후 실행한다 
- 업데이트가 끝난 직후이므로 DOM 관련 처리를 해도 된다. 
- state의 이전상태와 지금상태가 바뀌었을때, 어떤 작업을 하겠다라고 하면 할 수 있다. 



#### componentDidCatch

- 에러가 발생했을때 호출되는 함수이다. 
- 주의할 점은 에러가 발생할 수 있는 컴포넌트의 부모컴포넌트에서 기술을 해줘야 한다는 점.

```react
componentDidCatch(error, info){
	console.log(error);
    console.log(info);
}
```





## Unmount





## 사라질 것들...

will 3형제 



#### componentWillMount

- 서버사이드에서 컴포넌트를 마운트 하기 전에 쓰곤 하던 유물



#### componentWillRecieveProps

- 컴포넌트가 새로운 props를 받았을 때 호출됨. 
- 새롭게 받게될 props는 nextProps로 조회할 수 있으며, this.props를 조회하면 업데이트 되기 전의 API를 반환함. 
- getDerivedStateFromProps로 대체 사용가능



#### componentWillUpdate



---



참고 자료



https://www.youtube.com/watch?v=DyPkojd1fas&list=PLC3y8-rFHvwgg3vaYJgHGnModB54rxOk3&index=24



