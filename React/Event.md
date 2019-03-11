# Event



## 1. 이벤트 작성하기

1. 리액트에서 이벤트를 작성할때는 camelCase 형식으로 작성한다. 
2. 호출되는 이벤트는 중괄호 안에 표기한다. 



### functional component

this 키워드를 사용하지 않는다.

```react
<button onClick={clickFunction}>Click</button>
```



### class component

this 키워드를 사용한다.

```react
<button onClick={this.clickFunction}>Click</button>
```



## 2. 이벤트 바인딩

### this 바인딩 하는 4가지 방법  

- 리액트 문서에서는 3번째 혹은  4번째 방법으로 바인딩을 하도록 권하고 있다.



#### 1. 호출하는 부위에 this 바인딩 작성

- 렌더하는 시점에 this와 바인딩을 시킨다.
- 이때 bind는 해당 컴포넌트 클래스 자체를 가리킨다.
- 렌더 성능저하를 발생시킬 수 있다. 

```react
<button onClick={this.clickHandler.bind(this)}>Click</button>
```



#### 2. 호출하는 부위에 화살표함수로 기술

```react
<button onClick={() =>this.clickHandler()}>Click</button>
```



#### 3. 생성자에 bind 시키기

```react
constructor(props) {
      super(props)
    
      this.state = {
         message: 'Hello'
      }

      this.clickHandler = this.clickHandler.bind(this)
}

<button onClick={this.clickHandler}>Click</button>
```



#### 4. 화살표 함수형식으로 함수 작성하기