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

리액트는 키를 기준으로 값을 비교한다. 

```react
<ul>
    <li key="0">x</li> // key : 0, 값이 a => x 로 변경
    <li key="1">a</li> // key : 1, 값이 b => a 로 변경
    <li key="2">b</li> // key : 2, 값이 c => b 로 변경
    <li key="3">c</li> // key : 3, 값이 새로 생성
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
    <li key="x">x</li> // key : x, 값이 새로 생성
    <li key="a">a</li> // key : a, 값 그대로
    <li key="b">b</li> // key : b, 값 그대로
    <li key="c">c</li> // key : c, 값 그대로
</ul>
```



---



### 2. 인덱스를 키로 사용하면, 순서를 변경하지 않는다. 



#### 1) 나쁜 방식



index를 key로 가지는 리스트가 있다. 

```pseudocode
key:0, props:{name:'A'} 		<div>{props.name}</div>
key:1, props:{name:'B'} 		<div>{props.name}</div>
key:2, props:{name:'C'} 		<div>{props.name}</div>
```



렌더링이 되면 아마 이런 모양일 것이다.

```pseudocode
key:0, props:{name:'A'} 		<div>A</div>
key:1, props:{name:'B'} 		<div>B</div>
key:2, props:{name:'C'} 		<div>C</div>
```



---



자, 여기서 맨 앞에 'D' 를 하나 추가한다고 치자. 

key는 인덱스를 그대로 따를 것이므로 변화가 없고, props도 그대로 잘 전달되어서 렌더링이 될 것이다. 

```pseudocode
key:0, props:{name:'D'} 		<div>D</div>
key:1, props:{name:'A'} 		<div>A</div>
key:2, props:{name:'B'} 		<div>B</div>
key:3, props:{name:'C'} 		<div>C</div>
```



---



하지만, 여기에 기존의 데이터가 들어있었다면 문제가 달라진다. 

```pseudocode
key:0, props:{name:'A'} 		<div>{props.name}<input value="aaa"/></div>
key:1, props:{name:'B'} 		<div>{props.name}<input value="bbb"/></div>
key:2, props:{name:'C'} 		<div>{props.name}<input value="ccc"/></div>
```



key가 같으므로, 전달되는 props만 달라질 뿐, 렌더링을 새롭게 하지는 않는다. 

```pseudocode
key:0, props:{name:'D'} 		<div>{props.name}<input value="aaa"/></div>
key:1, props:{name:'A'} 		<div>{props.name}<input value="bbb"/></div>
key:2, props:{name:'B'} 		<div>{props.name}<input value="ccc"/></div>
key:3, props:{name:'C'} 		<div>{props.name}<input value=""/></div> // 새로 생성됨.
```

리액트의 입장에서는, 키가 같다면, "맨 앞에 값을 '추가' 했다"고 받아들이는 게 아니라, 단순히 "props 만 변경되었다"고 간주할 수 밖에 없기 때문이다. 



프로그래밍 적으로 세분화해서 생각해보면, "값을 맨 앞에 추가한다"는 것은 단순히 하나를 집어넣는 것이 아니라, 모든 순서를 하나씩 밀고 맨 앞에 값을 집어넣는 과정인 것이다. 

---



#### 2) 좋은 방식

생각을 다시 바꿔서,  key를 index가 아닌, 고유한 이름 'name' 으로 바꿨다고 치자.

```pseudocode
key:A, props:{name:'A'} 		<div>{props.name}<input value="aaa"/></div>
key:B, props:{name:'B'} 		<div>{props.name}<input value="bbb"/></div>
key:C, props:{name:'C'} 		<div>{props.name}<input value="ccc"/></div>
```



이렇게 하고 맨 앞에 D를 추가하면, 리액트의 입장에서는 맨 앞에 key 가 하나 '추가' 되었다라는 것을 알 수 있다. 정상적으로 렌더링이 된다. 

```pseudocode
key:D, props:{name:'D'} 		<div>{props.name}<input value=""/></div> // 새로 추가됨
key:A, props:{name:'A'} 		<div>{props.name}<input value="aaa"/></div>
key:B, props:{name:'B'} 		<div>{props.name}<input value="bbb"/></div>
key:C, props:{name:'C'} 		<div>{props.name}<input value="ccc"/></div>
```



참고자료 : 

https://medium.com/@vraa/why-using-an-index-as-key-in-react-is-probably-a-bad-idea-7543de68b17c

https://css-tricks.com/how-react-reconciliation-works/

https://github.com/yannickcr/eslint-plugin-react/blob/master/docs/rules/no-array-index-key.md

https://www.reddit.com/r/reactjs/comments/3og45e/index_as_a_key_is_an_antipattern/
