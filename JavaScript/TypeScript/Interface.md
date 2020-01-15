# Interface



## 객체 인터페이스

```typescript
interface Human {
    name : string;
    age : number;
}

function hello(person: Human): void {
    console.log(`hello, I'm ${person.name}`);
}

const p1: Human = {
    name: "Mark",
    age: 35
}

hello(p1);
```



## 특정하지 않은 값을 설정할때 : indexable type

```typescript
interface Person3 {
    name: string; // 꼭 있어야함
    age?: number; // 없어도 됨
    [index: string]: any; // 아무타입이나 추가가능
}

const p31: Person3 = {
    name: "Makr",
    gender: "male" // 이렇게 추가 가능
}
```





## 함수값 설정하기

```typescript
interface Person4 {
    name: string;
    hello(age:number): void;
}

const p41:Person4 = {
    name:"Mark",
    hello : (age)=> {console.log(age)}
}
```





## 함수 인터페이스

```typescript
interface HelloHuman{
    (name: string, age?: number): void;
}

const helloPerson: HelloHuman = function (name: string){
    console.log(`안녕하세요 ${name}입니다.`)
}

helloPerson('Mark');
```





## 구현과 상속

- 인터페이스로의 상속은 가능하지만, 클래스로는 구현만 된다. 



## 타입 앨리어스와의 차이점

```typescript
type Alias = {num:nuber}

interface Interface {
    num: nuber;
}
```

type alias 는 원형을 대상으로, 

interface는 Inteface 자체를 원인으로 컴파일한다.



새로 만들거면 Interface, 기존거를 조합할거면 type alias 사용할 것





# 상속과 합성





## 인터페이스 합치기

같은 이름의 인터페이스는 하나로 합쳐지게 된다.

```typescript
interface Greeting{
    korean:string
}

interface Greeting{
    english:string
}

const greeting:Greeting = {
    korean:"안녕",
    english:"hello" // 안적어주면 에러 난다. 
}
```

- 주의!! : 타입은 합쳐질 수 없다. 





# 타입 vs 인터페이스

```typescript
type Greeting = {
    korean:string
    english:string
} | string

type Hello = string | number;
```

- 타입은 합성할 수 없다. 
- 타입이 좀 더 넓은 범위, 
- 인터페이스는 주로 객체에 사용
- 타입은  = 를 꼭 적어줘야 한다. 
- 타입의 다형적인 특성때문에 '|' 과 함께 많이 쓰인다.
- 타입은 나중에 쓰일 수 있기 때문에, 인터페이스를 쓸수 있다면 인터페이스를 쓰도록 한다. 



# readonly

- 변경하지 못하도록 하는 타입고정 키워드

```typescript
interface test {
    readonly STR: string
}
```



# keyof

- 인터페이스의 키들의 집합을 타입으로 하는 것



```typescript
interface Greeting {
    Korean : "안녕",
    English : "Hi"
}

function SayGreeting(greetingStr: Greeting[keyof Greeting]): keyof Greeting {
    
}
```



## 임시값

뭐가 들어올지는 모르지만 넘버가 들어올 거 같을때

```typescript
interface Example {
    a: 3,
    b: 7,
    [key: string]: number;
}
```

