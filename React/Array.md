# 배열 다루기



## 1. 배열의 값 추가

### map으로 반환할 덩어리 생성하는 법

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



## 2. 배열의 값 제거

리액스에서 값 전달시 배열은 불변성을 유지해야 하므로 데이터를 조작할 때는 아래 두 함수를 사용한다. 아래 두 함수는 원래 배열을 건드리지 않는다.

- slice
- filter
- concat



### slice

- slice 에서 주의할 점은, slice(0,2)라고 입렸했을때 0에서 2까지를 가져오는 것이 아니라 0에서 2 앞에꺼까지를 갖고온다는 것이다.

```javascript
const numbers = [1, 2, 3, 4, 5];
numbers.slice(0,2); //0에서 2번째의 '앞'까지 : [1, 2]
numbers.slice(0,3); //0에서 2번째의 '앞'까지 : [1, 2, 3]
number; //원래 배열을 건드리지 않는다. : [1, 2, 3, 4, 5]
```



### fliter

- 조건에 해당하는 번째의 값만 배열에 추출해서 담아 리턴해준다. 

```javascript
const numbers = [1, 2, 3, 4, 5];
numbers.filter(n=> n>3);
numbers.filter(n => n!==3); //[1, 2 ,4 ,5]
```



### concat 함수의 사용

- concat은 this나 인수로 넘겨진 배열의 내용을 바꾸지 않고 대신 주어진 배열들을 합친 뒤 그것을 얕은 사본을 반환한다. 

```javascript
const numbers =[1,2,3,4,5];
numbers.slice(0,2).concat(numbers.slice(3,5))
```



### Object.assign 함수 

비구조화 할당 : this.props만 쓸 수 있는 함수는 아니라는 것을 기억하자. 



## 3. 배열의 값 수정

### map 함수 활용하기

```javascript
const numbers = [1, 2, 3, 4, 5];
numbers.map(n=>{
    if(n===3){
        return 9;
    }
    return n; // 주의 ! 여기를 빼먹으면 undefined가 리턴되어 [undefined, undefined, 9 , undefined, undefined]가 된다. 
})
```



### filter와 map의 차이점 : 반환값

- filter는 boolean을 반환하며,  반환값이 true일때 해당 인덱스에 해당하는 원소를 유지하고, false 이면 빼버린다. 
- map은 배열의 원소를 반환하며, 반환값을 배열의 원소로 대체한다. 