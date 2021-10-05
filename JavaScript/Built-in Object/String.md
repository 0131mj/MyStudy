# String

문자열이라고도 한다.



## String Object vs string primitive

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

string primitive 에 바로 .을 붙여서 함수를 호출할 수 있는데, 이는 컴파일시 자바스크립트엔진이 내부적으로 primitive를 new String() 함수를 사용하여 String Object로 변환해서 업무를 수행하기 때문이다.



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





### String.prototype.toString()

toString은 대부분의 빌트인 오브젝트에 포함되어 있으며, String의 prototype에도 toString이 있다. 

String 인스턴스를 생성하면 prototype에 toString이 포함되어 나오며 toString은 String Object의 Primitive 값을 반환한다.

```javascript
var a = new String(123);
console.log(typeof a); //object
var b = a.toString();
console.log(typeof b); //string
```



#### 다른 인스턴스의 toString 과의 차이점

Number 또는 Boolean 빌트인 오브젝트 등에 포함되어 있는 toString은 형변환의 용도인 반면,

String의 toString은 자신의 Primitive를 그대로 반환하도록 하는 일종의 가드 역할을 한다. 



만약 String의 prototype에 toString이 없다면 해당 인스턴스는 프로토타입 체이닝에 의해 

Object 빌트인 오브젝트의 toString까지 찾아서 거슬러올라갈 것이다. 

하지만 자신의 Primitive를 그대로 반환하는 함수를 prototype에 내재해둠으로서 프로토타입 체이닝을 미연에 방지하는 역할을 수행한다.



```javascript
var a = new String("abc");
a.toString(); // primitive 반환 : "abc", 만일 이게 없다면
a.__proto__.toString(); // object에서 찾음 [object Object] : 값이 이상하게 출력
```



#### toString()

그냥 toString만 작성하면 Object빌트인 오브젝트의 toString을 호출한다.



### String.prototype.charAt(n)

문자열에서 n 번째 문자를 반환

해당 문자열이 없을 경우, charAt은 공백문자("")를 반환하며 string[n] 의 경우 undefined 를 반환함





### substring vs substr vs slice

- substring(start, end) : start ~ end-1까지
- substr(start, length) : start ~ length 개
- slice(start, end): start ~  end까지



### indexOf vs search

- indexOf 는 문자를 검색하는데 비해,
- search는 정규표현식을 파라미터로 할 수 있다.