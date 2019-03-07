# Context

컨텍스트 API는 조상컴포넌트가 자손 컴포넌트에게 값을 다이렉트로 전달해주기 위해 사용하는 기술이다. 



### 상황

아래와 같이 컴포넌트가 감싸져있고, 컴포넌트 D에서 사용할 값을  컴포넌트 A가 전달해줘야 할때, CompoentB 와 ComponentC는 단순히 값을 전달하는 역할만 한다. 

```react
<ComponentA>
    <ComponentB>
        <ComponentC>
            <ComponentD/>
        </ComponentC>
    </ComponentB>
</ComponentA>
```



### 만드는 방법

userContext

```react
import React from 'react';

const UserContext = React.createContext('MyDefaultName'); // 디폴트 값은 옵션임.
const UserProvider = UserContext.Provider
const UserConsumer = UserContext.Consumer

export { UserProvider, UserConsumer }
```

- 이 때 디폴트 value를 사용할 수 있는데 디폴트값은 프로바이더 쪽을 기술하지 않거나, 값을 넣어주지 않더라도 컨슈머 쪽에서 사용하는데 문제가 없도록 기본값을 제공해주는 것이다. 
- 값이 들어온다면 디폴트 값은 무시된다. 





### 사용 방법

1. 최상에서 값을 제공해주는 쪽 : 전달이 시작되는 컴포넌트를 컨텍스트로 감싸서 값을 전달해준다. 

```react
import { UserProvider } from './userContext'

class App extends Component {
    render(){
        return(
 			<UserProvider name="myName">
    			<ComponentA/>
			</UserProvider>           
        )
    }
}
```



