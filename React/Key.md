## Key



## 인덱스를 키로 생성하면 안되는 이유 두가지

리액트에서 키를 인덱스로 사용하는 것은 좋지 않은 방법이다. 



### 1.  리액트는 특정 키에 대해 변경된 요소를 다시 렌더링 한다. 



#### 좋지 않은 방식

가령 다음과 같은 리스트가 있다고 쳐보자. 

(key는 map으로 생성된 것이다. )

```react
<ul>
    <li key="0">a</li>
	<li key="1">b</li>
	<li key="2">c</li>
</ul>
```



맨 앞에 x를 추가하면 모든 리스트가 하나씩 밀리기 때문에 리스트 전체를 다시 렌더링한다. 

```react
<ul>
    <li key="0">x</li>
	<li key="1">a</li>
	<li key="2">b</li>
    <li key="2">c</li>
</ul>
```



#### 보다 나은 방식

아래의 예제는 작위적인 예제이긴 하지만 보다 나은 사례이다. 

```react
<ul>
    <li key="a">a</li>
    <li key="b">b</li>
    <li key="c">c</li>
</ul>
```



키를 x로 둔 결과이다. 물론 x가 고유한 값이라는 전제 하에서 작업이 된 것이다. 

이제 x만 추가하면 된다. 

```react
<ul>
    <li key="x">x</li>
    <li key="a">a</li>
    <li key="b">b</li>
    <li key="c">c</li>
</ul>
```



### 2. 키를 우선 생성하고 나서 값을 비교한다. 

이 부분은 아직 정확하게 확인된건 아니지만 지금까지 이해한 바에 따르면 다음과 같다. 

1. 새로운 항목을 맨 앞에다 추가하려고 하면, 키를 우선 할당한다.
2. 이미 할당되어있던 키가 있다면, 해당 키의 내용이 변했는지를 확인하고, 할당된 키가 없다면 새로운 키를 생성한다. 앞의 예제의 경우,맨 앞에다가 넣어서 키를 변경하려고 시도했지만, 0, 1, 2 라는 키가 이미 있기 때문에 리액트에서는 "야, 키 0, 1, 2 는 이미 쓰고 있으니까 새로 할당되는 놈은 3번을 줘" 라고 해버린다. 
3. 0, 1, 2는 야, 키도 그대로고 값도 그대로네? 그래서 변함이 없고 엉뚱하게 3번에 갖다 달라붙는다. 
4. 새로운 뉴페이스는 자기가 사용할 키도 같이 갖고 오는 게 좋다. 

https://medium.com/@vraa/why-using-an-index-as-key-in-react-is-probably-a-bad-idea-7543de68b17c

https://css-tricks.com/how-react-reconciliation-works/

https://github.com/yannickcr/eslint-plugin-react/blob/master/docs/rules/no-array-index-key.md

https://www.reddit.com/r/reactjs/comments/3og45e/index_as_a_key_is_an_antipattern/