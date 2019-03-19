# React.memo

PureComponent는 기본적으로 클래스형 컴포넌트에서 사용이 가능하다. 

이를 함수형 컴포넌트에서 사용가능하도록 해주는 일종의 HOC 가 react.memo 이다. 



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

