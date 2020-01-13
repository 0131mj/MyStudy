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