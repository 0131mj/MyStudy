# 상속



## 객체지향 상속의 차이 - Java와 JavaScript



#### Java

- 상위Class가 확장하여 Class를 만들어낸다.
- 객체는 Class 를 통해서 만들어진다.



#### JavaScript

- 하위 객체가 상위객체를 상속받는다.
- 객체는 객체로 만들어진다.





## `__proto__`

```javascript
var a = {
    name: 'a',
    job : 'nurse'
}

var b = {
    name : 'b'
}

b.__proto__ = a;

console.log(a.job); // nurse
```

- a와 b 두 객체를 먼저 생성한 후에, `__proto__` 키워드로 프로토타입 링크를 연결시켜 준다.
- 이렇게 하면 b는 a에 있는 값을 그대로 다시 사용할 수 있게 된다. 
- 이게 가능한 이유는, 자바스크립트 엔진이, 어떤 객체에서 호출한 식별자가 없으면 자신의 프로토타입을 참조해서 검색하기 때문이다.

- 비표준 문법이다.  ( 하지만 직관적이기  때문에 예시로 든 것이다. )



```javascript
var a = {
  name : 'a',
  job  : 'nurse',
  age  : 20
}

var b = {
  name : 'b'
}

var c = {
  job : 'nurse'
}

b.__proto__ = a;
c.__proto__ = b;

console.log(c.name) // b
console.log(c.age)  // 20
```

- 이렇게도 가능하다. 
- c에서 age가 없기 때문에 없으면 타고 타고 또 타고 올라간다. 



## 상속시 주의사항 

#### 1. 상위객체의 값은 바뀌지 않는다.

- 자식의 값을 바꾼다고 해서 부모의 값이 바뀌진 않는다. 
- 예를 들어,  c의 job을 'doctor'로  바꾸면 c의 job만 doctor로 바뀌는 것이지, a의 job은 유지된다는 것이다.

#### 2. this 바인딩





## Object.create

```javascript
var a = {
  name : 'a',
  job  : 'nurse',
  age  : 20
}

var b = Object.create(a);
b.name = 'b';

var c = Object.create(b);
c.job = 'nurse'

console.log(c.name)
console.log(c.age)
```

- `__proto__`의 비표준문법을 개선하기 위해 만들어진 것이다. 
- 하지만 이렇게 하면 순서가 달라져버리는데, 상속받은 객체를 생성한 후에 추가적으로 값을 세팅해줘야 한다. 