# 배열 다루기

리액스에서 값 전달시 배열은 불변성을 유지해야 하므로 데이터를 조작할 때는 아래 두 함수를 사용한다. 아래 두 함수는 원래 배열을 건드리지 않는다.

- filter
- concat

## concat 함수의 사용

- concat은 this나 인수로 넘겨진 배열의 내용을 바꾸지 않고 대신 주어진 배열들을 합친 뒤 그 것을 얕은 사본을 반환한다. 
- slice 에서 주의할 점은, slice(0,2)라고 입렸했을때 0에서 2까지를 가져오는 것이 아니라 0에서 2 앞에꺼까지를 갖고온다는 것이다.

```javascript
const numbers =[1,2,3,4,5];
numbers.slice(0,2).concat(numbers.slice(3,5))
```





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

- 키가 없다면 리액트는 index를 사용한다. 
- 하지만 배열의 중간에 있는 걸 삭제하거나 추가할 때 문제가 발생할 수 있다. 그래서 키가 필요하다. 