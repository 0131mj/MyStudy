# 전개 연산자



## Iterable destructuring

전개 연산자 문법은 iteration interface 를 따른다. 

즉, 적용하려는 대상에 `[Symbol.iterator]` 가 구현이 되어있어야 사용 가능하다. 

배열을 전개하는데 쓰이는 대괄호구문은 배열을 둘러싼 부분이 아니라, iterable을 표현한 것이다.



#### 해체 가능 대상

- Array
- Map
- Set
- String



#### 예시

```javascript
const arr = [1, 2, 3];
console.log(...arr); //1 2 3
```





## Rest Parameter Operator vs Spread Operator

둘의 모습이 동일하므로 구분하는 방법을 설명한다. 

Rest 로 만든 후, Spread 로 소비하는 식으로 연관지어 쓰는 것은 자주 쓰이는 패턴이다.

이 둘을 사용하면 call 과 apply 가 필요없어진다. 



#### Rest Parameter Operator

- 함수의 파라미터에 기술함. 
- 배열이 아닌 값을 배열로 만들어 준다. 
- Iterator 를 소비하지 않는다. 

```javascript
const myFunc = (...arg) => console.log(arg);
```



#### Spread Operator

- 함수가 아닌 곳에서 기술함
- 펼쳐주는 역할을 한다.

```javascript
const a = [...iter];
```
