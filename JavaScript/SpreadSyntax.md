# 전개 연산자

- 간단한 예로, 배열을 펼쳐서 연산시켜주는 연산자로 활용이 가능하다. 

```javascript
const arr = [1, 2, 3];
console.log(...arr); //1 2 3
```





## Iterable destructuring

단, 해체 구문은 배열 자체를 해체하는 구문이 아니라, iterable 을 해체하는 구문이다. 

배열이나 객체를 해체하는데 쓰이는 대괄호구문은 배열을 둘러싼 부분이 아니라, iterable을 표현한 것이다.



- Array destructuring ( x )
- Iterable destructuring ( O )





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

