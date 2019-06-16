# TypeScript

- 타입스크립트는 자바스크립트의 수퍼셋으로, 정적인 타입을 지원한다. 



## 변수 선언



### enum

```typescript
enum Color {Red, Green, Blue}
let c: Color = Color.Green;
console.log(c); //1
```



### unknown vs any

- any 타입은 무엇이든 수용이 가능하기 때문에, 에러를 뱉지 않지만, unknown으로 선언한 변수는 들어온 값에 따라 자동으로 확인이 되기 때문에 number 타입을 upperCase 함수를 사용하려면 에러가 출력된다.



### union type

```typescript
let multiType: number | boolean;
multiType = 20;
multiType = true;
multiType = 'hello'; / /Error
```





## 함수 선언



### function 기본구조

```typescript
function 함수명(변수명: 매개변수타입) : 반환형타입{
    return ...
}

function add(num1: number, num2 : number) : number{
    return num1 + num2;
}
```



### 기본값 설정

```typescript
function add(num1: number, num2 : number = 20) : number{
    return num1 + num2;
}

console.log(add(1, 3))
console.log(add(1))
```



### interface

```typescript
interface Person {
    firstName: string, 
    lastName?: string // 옵션값
}
function fullName(person: Person){
    console.log(`${person.firstName} ${person.lastName}`);
}
```

