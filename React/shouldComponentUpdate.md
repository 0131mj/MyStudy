# shouldComponentUpdate - 성능최적화

불필요한 렌더링을 제거하기 위해서 shouldComponentUpdate 를 사용한다. 



- 기본적으로 shouldComponentUpdate 문을 작성하지 않으면 return true로 설정되어 있다(고 보면된다). 
- 그래서 항상 값이 바뀌면 렌더링을 다시 한다. 

```react
shouldComponentUpdate(){
    return true;
}
```



- state나 props가  달라졌을 때 렌더링을 해주겠다고 조건을 걸려면 이렇게 하면 된다. 

```react
shouldComponentUpdate(nextProps, nextState){
    
    if(this.state !== nextState){
        return true;
    }
    // state가 바꼈을 때
    return this.props.info !== nextProps.info; // props가 바꼈을때
}
```

