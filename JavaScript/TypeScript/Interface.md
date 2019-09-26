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