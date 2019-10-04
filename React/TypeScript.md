# TypeScript in React



## loader 세팅

### React with Babel [ es6, jsx ]

- loader
  - babel-loader
    - babel-core
    - babel-preset-env
    - babel-plugin-transform -react-jsx



### React with TypeScript [ ts, tsx ]

- loader
  - ts-loader
    - typescript
  - tslint-loader
    - tslint
    - tslint-react



## class Component

```react
export interface AppProps {
    name: string;
}

interface AppState {
    age: number;
}

class App extends React.Component<AppProps, {age: number;}> {
    constructor(props: AppProps){
        super(props);
    }
}
```



## stateless Component

```react
export interface AppProps {
    name: string;
}

const StatelessComponent:React.SFC<AppProps> = (props:AppProps) => {
    return (
        <h2>{props.name}</h2>
    )
}
```





