# 컴포넌트 생명주기



#### constructor

```react
constructor(props){
    super(props)
}
```

- extends Component의 값을 재사용해주기 위해 쓴다고 한다. 하지만 그냥 익스텐즈로 충분하지 않은가?
- super는 무엇을 하는가?  자바스크립트의 super는 "부모의 생성자를 호출한다."고 되어있다. 



#### shouldComponentUpdate

- 리액트에서는 부모의 상태가 바뀌면 자식의 상태도 렌더링을 기본적으로 해주게 되어있다.
- 성능을 최적화 하기위해 사용할 수 있다. state를 바꿨음에도 불고하고 렌더링을 하지 않도록 하고 싶다면 이 주기를 false로 만들면 된다. 
- virtual DOM에 나타나게 할지 말지를 결정해주는 함수라고 할 수 있다. 



#### getSnapshotBeforeUpdate

- 렌더링을 하고난 후, 화면에 그리기 바로 직전에 생긴다.
- render -> **getSnapshotBeforeUpdate** -> 화면에 반영
- 주로 스크롤의 위치, 크기 등을 설정해주기 위해 사용한다. 



#### componentDidUpdate

- state의 이전상태와 지금상태가 바뀌었을때, 어떤 작업을 하겠다라고 하면 할 수 있다. 



#### getDerivedStateFromProps()

- props로 받아온 값을 state로 동기화할때 사용

```react
static getDerivedStateFromProps(nextProps, prevState){
    
}
```





## 사라진 것들...

#### componentWillMount

- 서버사이드에서 컴포넌트를 마운트 하기 전에 쓰곤 하던 유물



#### componentWillRecieveProps

- 컴포넌트가 새로운 props를 받았을 때 호출됨. 
- 새롭게 받게될 props는 nextProps로 조회할 수 있으며, this.props를 조회하면 업데이트 되기 전의 API를 반환함. 
- getDerivedStateFromProps로 대체 사용가능



