# ref

- DOM에 직접적으로 접근할 일이 있을 때 ref 를 사용한다. 
- DOM에 일종의 아이디를 넣어주는 방식과 같다고 생각하면 된다. 



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

