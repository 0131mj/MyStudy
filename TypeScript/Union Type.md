# Union Type

```typescript
let multiType: number | boolean;
multiType = 20;
multiType = true;
multiType = 'hello'; // Error
```

파이프를 이용해서 여러 개의 타입을  동시에 수용하는 타입



```typescript
interface a {
    name: string;
    age: number;
}

interface b {
    name: string;
    gener: string;
}

type human = a | b;

function account (user:human){
    console.log(user.) // name만 자동완성됨
}	
```

에디터에서는 둘의 공통된 타입만 자동완성이 가능하다. 에디터가 책임질 수 있는 부분까지만 도와주는 것 같다. 