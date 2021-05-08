# String



## String primative vs String object

```javascript
const abc  = "abc";
const abc2 = String("abc");
const abc3 = new String("abc");
const def  = new String("def");

abc  instanceof String; // false
abc1 instanceof String; // false
abc2 instanceof String; // true

typeof abc;  // string
typeof abc1; // string
typeof abc2; // object

/** 강제 캐스팅 **/
const abc2de = abc2 + "de";
const abc3de = abc3 + "de";
const abc3def = abc3 + def;

typeof abc2de; //string
typeof abc3de; //string
typeof abc3def; //string
```



## 강제 캐스팅

문자열 오브젝트가 "+" 연산자로 연산을 수행하면, 기본 string 타입으로 변경된다.



## 내장함수

search

### replaceAll
이 함수는 생각보다 최근에 도입되었다. 
Node.js 는 15.0.0 부터, Chrome 85 부터 지원한다. 