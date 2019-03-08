# State 

- State는 항상 객체 형태로 저장되어야 한다.
- state를 변경할 때는 setState 사용
- this 바인딩은 생성자에서 .bind 함수를 사용해서 만든다. 
- 리액트는 상태가 변경될 때마다 render 함수를 다시 호출한다. 

```react
constructor(props){
    super(props);
    this.handleIncrease = this.handleIncrease.bind(this)
    this.handleDecrease = this.handleDecrease.bind(this)
}
```

클래스 안에서 화살표 함수가 아닌 방식으로 함수를 정의하면 this를 읽어오지 못한다. 

따라서 화살표함수로 정의하거나 혹은 위에서처럼 bind를 걸어준다. 

굳이 해야할 경우 이렇게 하는 것이며, 화살표 함수로 만들면 위처럼 작성하지 않아도 무방하다. 





## setState



### setState는 비동기로 동작한다. 

```react
handleClick(){
    this.setState({
        clicked: true
    })
    console.log(this.state); // null
}
```

setState는 컴포넌트가 즉시 변경되는 것을 보장하지 않는다. 

왜냐하면 성능상의 문제 때문에 컴포넌트를 나중에 한꺼번에 업데이트를 하기 때문이다. 



### setState 의 작동방식

setState는 첫번째 인자로 변경할 함수를 받고 두번째 인자로는 콜백함수를 받는다. 

```react
setState(stateChange, [callback])
```



### callBack

setState의 두번째 매개변수로 함수를 전달할 수 있다. 

따라서, setState 뒤에 어떤작업을 수행하고 싶다면 콜백함수를 사용할 수 있다. 

(componentDidUpdate 에서 실행해도 된다. 그편이 낫다. )



콜백함수를 사용한다면 아래처럼 이전 상태와 props를 매개변수로 받아서 업데이트 하는 함수를 쓸 수 있다. 

이건 static getDerivedStateToProps 를 대신 사용할 수도 있다. 

```react
this.setState((prevState, props)=>{
    return {counter: prevState.quantity + props.number}
})
```





### 한 라이프 사이클 안에서의 setState

한 라이프사이클 안에서 setState 는 한번만 실행된다. 

```react
 componentDidMount() {
        this.setState({
            quantity: this.state.quantity + 100
        });
        this.setState({
            quantity: this.state.quantity + 10
        });
    }
```

- 위와 같은 코드를 실행하면 quantity가 110이 올라가는 것이 아니라, 10만 올라간다. (뒤에 꺼가 먹힌다.)



## state vs props

### props 

- 변경불가
- 함수형컴포넌트 : props
- 클래스형컴포넌트 : this.props 

### state 

- 변경가능
- 함수형컴포넌트 : useState Hook
- 클래스형컴포넌트 : this.state