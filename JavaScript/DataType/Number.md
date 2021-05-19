# Number

number 타입은 아래와 같은 특수한 3가지 값을 추가로 갖는다. 

- NaN
- negative Infinity
- positive Infinity

https://tc39.es/ecma262/#sec-terms-and-definitions-number-type



### NaN

```javascript
console.log(typeof NaN); // number
```

- 좀 헷갈릴 수가 있는데, Not a Number 라는 게 숫자가 아니라고 했지만, 타입은 숫자로 떨어진다. 

- NaN은 숫자가 아니지만, 자바스크립트의 숫자타입이기는  하다.
