# ref

- ref는 DOM에 직접적으로 접근할 수 있게 해준다.
- DOM에 일종의 아이디를 넣어주는 방식과 같다고 생각하면 된다. 
- ref를 사용하면 자식컴포넌트를 참조할 수도 있다. 



## ref를 사용하는 방식

### 1. 직접 선언

```react
update(){
    this.setstate({
        a:this.refs.a.value
    })
}

render(){
    return(
		<input 
    		name = 'phone'
    		ref = 'a'/>
    )
}
```

ref 라고 선언하고, refs.value로 값을 얻어온다. 



### 2. 함수를 사용

```react
update(){
    this.setstate({
        a:this.a.value
    })
}

render(){
    return(
		<input 
    		name = 'phone'
    		ref = {node=> this.a = node}/>
    )
}
```

- node에 정의를 해놓으면 refs.라는 키워드 없이도 바로 값을 얻어올 수 있다. (이름은 달라도 무방)



### 3. (16.3 버전 이후부터 사용가능)



```react
input = react.createRef();

update(){
    this.input.current.focus();
}

render(){
    return(
		<input 
    		name = 'phone'
    		ref = {this.input}/>
    )
}
```



---



## ref를 사용하여 값을 얻어오기

```react
import React, { Component } from 'react';
import './App.css';

class App extends Component {

  componentDidMount(){
      console.log(this.myDiv.getBoundingClientRect())
  }
  render() {
    return (
      <div ref={ref => this.myDiv = ref}>
          <h1>hello</h1>
      </div>
    );
  }
}

export default App;

```

- 이렇게 하면 콘솔에 ref의 대상이 되는 myDiv의 속성값이 출력된다. 



## 하위 컴포넌트 참조하기

##### FocusInput(상위 컴포넌트)

```react
import React, { Component } from 'react'
import Input from './Input';

class FocusInput extends Component {
    constructor(props) {
      super(props)
      this.componentRef = React.createRef() // 1) componentRef 를 심어놓는다.
    }
 
    clickHandler = () => {
        this.componentRef.current.focusInput(); //3) 부모컴포넌트에서 자식컴포넌트에 있는 함수를 자기꺼인냥 사용할 수 있다.(focusInput은 하위컴포넌트에 있는 함수이다.)
    }
    
    render() {
        return (
        <div>
            <Input ref={this.componentRef}/> {/** 2) 자식컴포넌트에 ref를 붙인다.**/}
            <button onClick={this.clickHandler}>Focus Input</button>
        </div>
        )
    }
}

export default FocusInput
```



##### FocusInput(하위 컴포넌트)

```react
import React, { Component } from 'react'

class Input extends Component {
    constructor(props) {
        super(props)
        this.inputRef = React.createRef();
    }

    focusInput(){
        this.inputRef.current.focus();
        this.removeText();
    }
 
    render() {
        return (
        <div>
            <input type="text" ref={this.inputRef}/>
        </div>
        )
    }
}

export default Input
```





## ForwardRef

ForwardRef를 사용하면 하위컴포넌트 인스턴스의 ref 를 부모가 강제로 묶을 수 있다.

이 방식의 좋은 점은, 하위컴포넌트에 붙어있는 함수를 가져다 쓰는 것이 아니라, 상위 컴포넌트 자신이 함수를 정의 하고 참조할 ref만 하위로 내려주어 붙일 수 있다는 점이다.

```react
import React, { Component } from 'react'
import FRInput from './components/FRInput';

class FRParentInput extends Component {
    constructor(props) {
      super(props)
        this.inputRef = React.createRef()
    }

    clickHandler = () =>{
        this.inputRef.current.focus();
    }
    
  render() {
    return (
      <div>
          <FRInput ref={this.inputRef} />
          <button onClick={this.clickHandler}>Focus Input</button>
      </div>
    )
  }
}

export default FRParentInput
```



```react
import React from 'react'
const FRInput = React.forwardRef( 
    (props, ref)=> {
        return (
            <div>
                <input type="text" ref={ref}/>
            </div>
        );
    }
) 

export default FRInput
```

