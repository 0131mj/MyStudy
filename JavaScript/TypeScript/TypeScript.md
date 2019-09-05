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





## Object Type 

- primative Type 이 아님을 강제함



## Tuple

```typescript
let tu : [string, number] = ['hello', 1]
```

- 함수의 arguments 타입을 체크하는데도 사용됨.



## any

```typescript
function leakingAny (value: any){
    let a: number = value.num;
    let b = number + 1;
    return b;
}

let c: number = leakingAny(1)
let c: number = leakingAny("s")
```

- 최대한 쓰지 말 것.

- 누수를 막기 위한 전략 : 리턴타입을 any가 아닌 값으로 받는다. (들어갈땐 any, 나올땐 특정타입)



# assertion

```typescript
const dom = document.queySelector("#btn") as HTMLButtonElement;
```

- 특정타입이라고 우기는 것
- 위에서의 결과는 null 일수도 있고, dom 일수도 있지만 (못찾았을 경우), 100% 찾을 수 있다고 그리고 저형태라고 억지로 써놓은 것이다. 컴파일러에게 "그럴리가 없어, 내가 다 체크했으니까 일일이 검사하지마" 라고 하는 명령이다.
- 주의 : 형이 변하는 것은 아님!!