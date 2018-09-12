# 배열 다루기

concat 함수의 사용

- concat은 this나 인수로 넘겨진 배열의 내용을 바꾸지 않고 대신 주어진 배열들을 합친 뒤 그 것을 얕은 사본을 반환한다. 



Object.assign 함수 



비구조화 할당 : this.props만 쓸 수 있는 함수는 아니라는 것을 기억하자. 



## map으로 반환할 덩어리 생성하는 법

```react
const list = data.map(
    info => (<PhoneInfo info={info} key={info.id}) />)
)
return(
    <div>{list}</div>
)
```

이렇게 하면 <PhoneInfo />  <PhoneInfo /> <PhoneInfo /> <PhoneInfo /> <PhoneInfo /> 

이런 형태의 컴포넌트 덩어리를 리스트에 넣어서 반환할 수 있다. 

컴포넌트를 반드시 맵에서 렌더링해야 한다는 고정관념을 버리고, map 함수를 통해 미리 만든 다음에 전달해줄 수 있다는 사실을 기억하자. 



## key