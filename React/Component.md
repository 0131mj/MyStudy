# Component

- 컴포넌트는 리액트를 구성하는 기본 단위이다. 
- 모든 컴포넌트는 render function을 가져야 한다. 



## 컴포넌트의 겉과 속

컴포넌트는 보이는 모습과, 실제 모습이 다르다.  처음에 이게 좀 헷갈릴 수가 있다. 

예를 들어, 우리는 <img/>라는 태그를 사용할 때, <img/>태그는 <img/>태그 그 자체였다.  

(그럼 <img/>가 <img/>가 아니고 뭐란 말인가?) 



하지만 리액트에서는 사정이 다르다. 부모에서 바라본 모습이, 자식의 실체와는 전혀 다를 수 있다는 것이다. 

이 혼란은, 애초부터 컴포넌트가 엘리먼트랑 비슷하게 (둘다 태그모양) 생겼기 때문에 발생하는 혼란이다. 



컴포넌트 외부에서의 모습

```react
<GoodBoy />
```



실제 모습

```react
<div>
    <p>BadBoy</p>
</div>
```



우리가 기존에 사용한 이미지라는 것은 "엘리먼트" 였다. 그건 쪼갤 수 없는 원자같은 놈이다.  이놈은 겉과 속이 다를 리가 없고, 속 따위 가질 여유도 없는 가난한 녀석이다. 

하지만 컴포넌트는 급이 다르다.  여러 엘리먼트들의 조합으로 이뤄지기도 하고 속에 들어가는 데이터가 달라지기도 한다. 우리가 단순한 엘리먼트를 부를 땐 div태그, li태그 이렇게 부를 수 있겠지만, 컴포넌트는 그 이상이다. 'div태그 안에 p태그가 있고 그 안에 span태그가 있는 엘리먼트' 라고 매번 부를 수는 없지 않은가. 그래서 따로 이름을 만들어붙이고, 다른 형식으로 하기는 좀 뭐하니까 동일한 형식인 태그방식으로 표기하되, 이름을 대문자로 표기하여 컴포넌트임을 알 수 있게 만든 것이다. 

이게 엘리먼트와 컴포넌트의 차이다. 









## 컴포넌트의 종류

### Class Component

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



### function Component (함수형 컴포넌트)

```jsx
function MyStatelessComp({param}){
    return (
        <div>{param}</div>
    )
}
```

- 보다 간단한 형태의 컴포턴트이다. 
- Component를 상속받아서 만들어지는 것이 아니라, function형태로 작성된다. 
- state가 없고 
- props만 전달 받는다. 
- 생명주기, render가 없고, return만 존재한다.  즉, 라이프사이클을 타지 않는다.  
- 초기 로딩이 조금 더 빠르고, 메모리를 덜 사용한다.
- component를 extends 하지 않는다. 



#### 더 간단히 표현하기 (화살표 함수 방식)

```react
const MyName = ({ name }) => {
    return <div>안녕하세요. 제 이름은 {name} 입니다.</div>;
}
```





## 컴포넌트의 3대 요소



### 1. 상태 (state)

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



### 2. 프로퍼티(props)

리액트에서는 부모 컴포넌트에서 자식 컴포넌트로 프로퍼티를 전달할 수 있다. 



#### 부모 컴포넌트에서 전달 : key = {value}

```jsx
 <Child mytext={"text"}/>
```



#### 자식 컴포넌트에서 받기 : {this.props.key}

```jsx
<p>{this.props.mytext}</p>
```



#### 기본 프로퍼티선언하는 방법 : 

##### 방법 1. 컴포넌트 내부에 static defaultProps 를 만들어준다. (방법 2보다 최신 문법임.)

```react
class MyName extends Component{
	static defaultProps = {
    	name : "홍길동"
	}   
	...
}
```



##### 방법 2. 컴포넌트 외부에 static defaultProps 를 만들어준다.

```react
class MyName extends Component{
	...
}

MyName.defaultProps = {
    name : "홍길동"
}
```



### 3. 이벤트(onXXX)



## JSX

컴포넌트 안에서 조건식을 쓰는 방법 : 즉시실행 함수로 구현 가능함.

```react
return{
    <div>
        {
            if(value === 1) return <div>1이다.</div>
            if(value === 2) return <div>2이다.</div>
            if(value === 4) return <div>3이다.</div>
        }
    </div>
}
```



