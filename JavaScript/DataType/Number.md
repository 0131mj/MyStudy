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



### number 타입으로 자동 형변환

- number 타입이 아닌 객체를 연산하려고 하면, 자동으로 형 변환이 발생한다.
- 연산에 실패한다면 (연산의 대상이 하나라도 숫자가 아니라면, NaN이 된다. )

| 전달받은 값      | 형 변환 후                                                   |
| :--------------- | :----------------------------------------------------------- |
| `undefined`      | `NaN`                                                        |
| `null`           | `0`                                                          |
| `true and false` | `1` 과 `0`                                                   |
| `string`         | 문자열의 처음과 끝 공백이 제거됩니다. 공백 제거 후 남아있는 문자열이 없다면 `0`, 그렇지 않다면 문자열에서 숫자를 읽습니다. 변환에 실패하면 `NaN`이 됩니다. |

https://ko.javascript.info/type-conversions