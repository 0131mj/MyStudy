# Render Props

렌더 프롭이란, 일종의 아키텍쳐 패턴으로, JSX에서 props 형태로 렌더함수를 받은 다음 보여달라는 대로 렌더하는 방식이다. 

```jsx
<Counter render={(count)=>(<Check count={count}/>)} />
<Counter render={(count)=>(<Radio count={count}/>)} />
```

이렇게 컴포넌트를 정의하면, 실제로 Counter 컴포넌트 내에서는 render라는 이름의 프롭을 받아서 출력한다.



아래와 같이 children 형태로 보낼 수도 있다. 

```jsx
<Counter>
    {(count)=>(<Check count={count}/>)}
</Counter>
<Counter>
    {(count)=>(<Radio count={count}/>)}
</Counter>
```

이렇게 컴포넌트를 정의하면, 실제로 Counter 컴포넌트 내에서는 render라는 이름의 프롭을 받아서 출력한다.