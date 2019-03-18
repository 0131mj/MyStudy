# PureComponent

일반 컴포넌트와의 차이점 : shouldComponentUpdate의 작동방식이 다르다. 



## shouldComponentUpdate 의 방식

Comonent의 경우, 항상 default로  shouldComponentUpdate 를 true를 리턴한다.

하지만, PureComponent 의 경우 props와 state를 얕은비교만 한 뒤, 변경된 사항이 있을 때만 업데이트를 해준다.



### Shallow comparison

얕은 비교란 무엇인가?

> `props` 와 `state` 의 이전 값과 바뀔 값을 비교할 때, 얕은 비교를 수행하게 되는데, 원시형 값에 있어서는 같은 값을 가지는지 확인하게 됩니다. *(예:* `*1*`*은* `*1*`*과 같고,* `*true*`*는* `*true*`*와 같은 것처럼.)*
>
> 그리고 오브젝트와 배열과 같은 복잡한 자바스크립트 값에 있어서는 [참조하고 있는 객체가 같은지 확인](https://gist.github.com/async3619/1b0d36357e4e318bebea9938d65fceff)합니다.



## 주의할 점



### props와 state 값 직접 변경 금지

props와 state를 직접변경해서는 안된다.  PureComopnent에서는 참조값을 비교하기 때문에 값을 '대체'해버려야 한다.





### 값을 함수 안에서 넘기지 말것



#### 나쁜 패턴

이런식으로 하면 매번 부모 컴포넌트의 렌더 시점에 새로운 레퍼런스를 가지는 새로운 함수가 생성되고, likeComment로 넘겨진다. 또한, 순수컴포넌트일 경우 레퍼런스가 달라지므로 렌더링을 다시 수행한다. 

```react
<CommentItem likeComment={() => this.likeComment(user.id)} />
```



#### 더 나은 패턴

부모 컴포넌트 메소드를 직접 넘기는 것이 좋은 방법이다. 이렇게 하면 불필요한 렌더링을 여러번 수행하지 않는다.

```react
<CommentItem likeComment={this.likeComment} userID={user.id} />
```





### 렌더에서 값을 재창조 하지 말것

매번 렌더에서 값을 할당하는 것은 메모리를 많이 잡아먹게 한다.

렌더가 아니라, componentDidMount 등으로 옮겨두고 state를 캐시해서 쓰도록 하자. 



---

참고자료

https://medium.com/@async3619/when-to-use-component-or-purecomponent-b810897a19a2

