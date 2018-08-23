# State 

- State는 항상 객체 형태로 저장되어야 한다.
- state를 변경할 때는 setState 사용
- this 바인딩은 생성자에서 .bind 함수를 사용해서 만든다. 

```react
constructor(props){
    super(props);
    this.handleIncrease = this.handleIncrease.bind(this)
    this.handleDecrease = this.handleDecrease.bind(this)
}
```

굳이 해야할 경우 이렇게 하는 것이며, 화살표 함수로 만들면 위처럼 작성하지 않아도 무방하다. 