# render



렌더링 최적화 

리턴부분에 객체, 어레이, 함수등을 리터럴로 쓰지말것

## 렌더링 성능 개선하기

### - 렌더링에 함수 걸어놓은 것을 생성자로 옮겨 바인딩하기

#### 변경 전

```react
render(){
    return{
        <button onClick = {() => this.handleClick}></button>
    }
}
```

#### 변경 후

```react
constructor(props){
    super(props)
    this.handleClick = this.handleClick.bind(this);
}
render(){
    return{
        <button onClick = {() => this.handleClick}></button>
    }
}
```

렌더링 나누기

```react
renderUserMenu(){
    
}
render(){
    return{
        <div>
            {this.userExists && this.renderUserMenu}
        </div>
    }
}
```

