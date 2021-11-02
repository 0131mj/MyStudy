# Generic

제네릭 선언을 하면, 데이터 타입에 맞게 자료형을 찍어내는 공장같은 게 된다.

즉,  호출하는 시점에 타입을 결정하는 것이다.



#### 제네릭 인터페이스

```typescript
interface Args<T,U>{
    v: T,
    f: (v:T) => U
}
```





#### 제네릭 함수

```typescript
function execute<T,U>(args:Args<T,U>):U{
    const {f, v} = args;
    return f(v);
}

const split = (s:string):string[] => s.split('');
const sqrt = (n:number):number => n*n;

const splitResult = execute({v:"abc", f:split});
const sqrtResult = execute({v:5, f:sqrt});
```



#### 제네릭 extends



#### array 타입 선언하기 (제네릭방식 vs 일반방식)

```typescript
const data:Array<{name:string, val:number}> = [
    {
        name: 'a',
        val: 123
    },
    {
        name: 'a',
        val: 123
    },
]

const data2:{name:string, val:number}[] = [
    {
        name: 'a',
        val: 123
    },
    {
        name: 'a',
        val: 123
    },
]
```

