# Type Guard

런타임에 사용하는 연산자 instanceof , typeof, in 등과 함께 어우러져 쓰면, 컴파일타임에 인식을 한다.

특정 타입으로 타입의 범위를 좁혀서 필터링해나가는 과정

```typescript
function logMsg (value: string | number) {
	if (typeof value !== string || typeof value !== number) {
        throw new TypeError("value must be string of number");
    }
}
```



#### 사용자 정의 타입가드 함수 

- 'is' 라는 키워드를 사용해서 섞인 데이터 타입을 추려낼 수 있는 방법
- as 만 사용해서 타입 단언을 하는 것을 보완할 수 있다.

```typescript
interface IDeveloper {
    age: number;
    lang: string;
}

interface IDesigner {
    age: number;
    tool: string;
}

const getUserInfo = (user: IDesigner | IDeveloper) => {
    return user;
}

const a:IDeveloper = {
    age: 22,
    lang: 'Java'
}

const b:IDesigner = {
    age: 25,
    tool: 'Photoshop'
}

const isDeveloper = (target: IDesigner | IDeveloper): target is IDeveloper =>  (target as IDeveloper).lang !== undefined;

const ages = [a, b].map(person => {
    const info = getUserInfo(person);    
    if(isDeveloper(person)){
        console.log("lang: ", person.lang);
    }else{
        console.log("tool: ", person.tool);
    }
    return info.age;
})
```

참고: https://www.typescriptlang.org/docs/handbook/advanced-types.html#user-defined-type-guards