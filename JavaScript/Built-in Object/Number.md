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



### toString()

문자열로 변환하는 함수

인자가 없으면 10진수로 변환한다.

```javascript
console.log(10.toString()); // Syntax Error
console.log(10..toString()); // "10"
console.log((10).toString()); // "10"
```

- 리터럴로 작성시, 10.toString()을 하려면 에러가 난다.
- 자바스크립트에서는 숫자를 Int, double, float 등으로 구분하지 않는다.
  모든 숫자는 IEEE 754 국제 표준에서 정의한 64비트 부동 소수점 수로 저장된다. 
- 원래는 10. 을 변환대상으로 해야하는데 10을 변환대상으로 했기 때문에 문제가 발생하는 것이다.
- 이게 귀찮으면 괄호를 치자.



### toLocaleString()

```javascript
toLoaleString(locales, options)
```

- 브라우저가 지원하는 지역화 문자로 변환
- 한국기준) 1000 => 1,000 으로 끊어쓰기 형태로 만들어준다. 





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