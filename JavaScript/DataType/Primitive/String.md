# String

문자열이라고도 한다.

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

- search
- replaceAll : 이 함수는 생각보다 최근에 도입되었다. (Node.js 는 15.0.0 부터, Chrome 85 부터 지원한다.)





## Unicode

> 전 세계의 모든 문자를 다루도록 설계된 표준문자 전산처리방식 - 나무위키





## UTF

Unicode Transformation Format

유니코드의 코드포인트를 맵핑하는 방법



UTF-8로 코드포인트 맵핑시 아래와 같이 태그 사용

```html
<meta charset="utf-8">
```





## .length()

문자열의 길이를 구할 수 있다. 

```javascript
const str = "hello";
console.log(str.length);
```

.length를 만나게 되면 내부적으로 임시적인 String 인스턴스 (오브젝트) 를 생성하게 된다. 

아마 이런 모양일 것이다.

```javascript
const _tempStr = new String(str);
return _temsStr.length();
```



### 인덱스값 반환

```javascript
const str = "string";
console.log(str[0]);
```

위에서도 str을 임시적으로 String 오브젝트로 만들 것이다. 

인덱스를 반환할 수 있는 것은, String Object가 아래와 같이 문자열을 쪼개서 인덱스를 키로  값을 보관하고 있기 때문이다.

```javascript
str = {
    0: "s",
    1: "t",
    2: "r",
    3: "i",
    4: "n",
    5: "g"
}
```



