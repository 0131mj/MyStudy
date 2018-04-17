# Component의 종류



## Class Component

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

- Component -> render -> return -> JSX 의 위계구조로 구성된다. 
- Component를 상속받아서 class형태로 작성된다. 
- render의 return값이 출력되는 요소이다. 
- class 내에 메서드를 정의하여 사용가능하다. 



## function Component

```jsx
function MyStatelessComp({param}){
    return (
        <div>{param}</div>
    )
}
```

- 보다 간단한 형태의 컴포턴트이다. 
- Component를 상속받아서 만들어지는 것이 아니라, function형태로 작성된다. 
- state가 없고 props만 전달 받는다. 
- 생명주기, render가 없고, return만 존재한다. 





# 컴포넌트의 3대 요소



## 1. 상태 (state)

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



## 2. 프로퍼티(props)

리액트에서는 부모 컴포넌트에서자식 컴포넌트로 프로퍼티를 전달할 수 있다. 



부모 컴포넌트에서 전달 : key = {value}

```jsx
 <Child mytext={"text"}/>
```



자식 컴포넌트에서 받기 : {this.props.key}

```jsx
 <p>{this.props.mytext}<p/>
```



## 3. 이벤트(onXXX)