# memo

PureComponent는 기본적으로 클래스형 컴포넌트에서 사용이 가능하다. 

이를 함수형 컴포넌트에서 사용가능하도록 해주는 일종의 HOC 가 React.memo 이다. 



사용법은 간단하다. memo 로 감싸주면 된다. 

props에 변화가 없는 이상, 컴포넌트는 재렌더가 되지 않을 것이다. 

```react
import React from 'react'

function MemoComp({name}){
    console.log('render memo')
    return(
        <div>
            {name}
        </div>
    )
}

export default React.memo(MemoComp)
```



## 안써도 어차피 리렌더가 안되는것 아닌가?

- 쓰지 않으면, 먼저 비교 후에 바뀐 값이 없을 경우에만 virtualDOM을 갱신하지 않는다. 
- 하지만 memo 를 사용하면 virtualDOM의 비교하려는 행위 자체를 하지 않는다.



## 최적화

- 돔을 렌더하는 거랑 컴포넌트렌더링은 다르다. 
- 하이라이트에서 깜빡거리더라도, 실제 돔이 렌더링 되는 것은 아니다. 실제 돔 렌더링은 element 탭에서 확인한다. 



## React.memo vs useMemo

react.memo 는 props의 변화를 감지하고, props에 변화가 없으면 함수를 실행하지 않는다. 



## memo 의 대가

- memo 도 일종의 함수다. 즉, props를 비교하고 체크하는 것 자체에도 비용이 든다. 
- 따라서 memo 가 필요한 부분에만 적용한다.