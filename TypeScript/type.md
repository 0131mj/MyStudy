# Type



## Tuple

고정길이와 타입을 가진 배열

```typescript
let arr: [boolean, number, string] = [true, 2, "3"];
```



고정값을 넣을 수도 있다.

```typescript
let arr: [boolean, 2, string]
```





## object

객체타입 지정

```typescript
let person: object
```

- 주의할 사항 : 객체의 키값은 언제나 string 이기 때문에, 설령 1과 같은 숫자를 키값으로 지정하게되면, 선언시에는 에러가 나지 않더라도 런타임에서 에러가 날 수 있다. 

에러남 : does not exist on type

```typescript
interface IObj {
    [key:number]: string
}
```



수정됨

```typescript
interface IObj {
    [key:string]: string
}
```



타입이 있는 객체 지정

```typescript
let perseon: {name: string, age: number}
```





## as const

```typescript
const obj = {a:1, b:2} as const; //
obj.b = 3 //error
```

- 상수로 지정을 해버리면, 배열이나 객체의 프로퍼티를 추가하거나 바꾸는것을 막을 수 있다. 





## void

- return이 없는 함수는  return undefined 가 생략이 된 것이다. 이를 명시적으로 기술해주는 것이 void 이다.



연산자

optional chaining

```typescript
obj?.method?.()
```





never

-배열의 에러시에 주로 나온다. 



## as unknown as number

- 강제타입변환