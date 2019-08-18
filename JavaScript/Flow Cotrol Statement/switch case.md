# switch case

```javascript
if( a < 5 ) return true;

switch ( 3 ) {
    case 3: break;
}
```

- switch 구문은, 다른 구문과 달리 { } 블럭을 필수적으로 써줘야 한다. 
- 이 블럭은 중문이 아니다."switch label block" 이라는 특수 레이블 블럭이다
- switch 문 내부에서만 case를 컴필레이션 레코드로 바꿔준다. 





## label 과 break

case 구문은 하나의 label이다. 

따라서, break 를 걸지 않으면 문장을 순차적으로 실행해버린다. 





## 기명 레이블

label 을 명시적으로 지정해줄 수 있다. 

```javascript
a:
switch ( 3 ) {
    case 3: 
        b:{}
    case 4: break a;
    case 5:
    default:
}
```





## JavaScript 에서의 switch case 문

- 타 언어에서는 컴파일 타임에, 일치하는 case 를 제외한 나머지를 무시하고, 만족하는 case가 없으면 defult로 보내버리는 반면,
- JavaScript 에서는 런타임에 case 문을 순차적으로 아래로 실행한다. 



#### 값으로 확정지을 수 없고, 조건으로 확정지어야 하는 case 문

- 값을 확정 짓고, 조건을 case label 에 기술한다.
- 조건이 한정적이고 값이 다양할 때 사용

```javascript
let a = 3, b = 0;
switch (a) {
    case b++ : console.log('a', b); break; // 1
    case b++ : console.log('b', b); break; // 2
    case b++ : console.log('c', b); break; // 3
    case b++ : console.log('d', b); break; // 실행됨
    case b++ : console.log('e', b); break;
}
```



#### 조건이 다양하고 값이 한정적인 경우의 case 문

- 조건이 복잡한 경우에 사용 (다양한 조건을 넣을 수 있음)

```javascript
let a = 3;
switch (true) {
    case a > 5 : console.log('a', a); break;
    case a > 4 : console.log('b', a); break;
    case a > 3 : console.log('c', a); break;
    case a > 2 : console.log('d', a); break;
    case a > 1 : console.log('e', a); break;
}
```





## switch case 문 사용시 유의사항

- 위에서 아래로 순차적으로 흐른다는 특징 때문에, 우선되어야 하는 조건을 가장 윗 순서에 기술해줘야 하는 제약이 있다. 
- 이것은 논리적인 함정에 빠질 가능성이 있기 때문에, 단순한 값을 비교하는 등의 케이스에만 사용할 것을 권장한다.
- 반드시 default label 을 만들어 주어야 한다. switch 문은 병행조건을 기술하는 것이기 때문에, 어떤 조건이 생기면 그 조건을 제외한 여집합이라는 것이 무조건 발생되기 마련이다. 그 모든 것에 대응하기 위해, default 는 필수적이다.