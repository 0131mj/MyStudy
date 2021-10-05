# Primitive 원시값

더 이상 쪼갤 수 없는 값이다. 

개발자도구에서 출력해보면 값 그자체로 찍힌다. 

- boolean
- number
- string
- null
- undefined



## Undefined

모든 변수의 기본값은 undefined로  기본 할당된다. 



Undefined : 타입

undefined: 값



### undefined 의 두가지 얼굴

- 값이 정말로 없는 undefined 와 , 명시적으로 지정된 undefined가 있다.



### null vs undefined

- undefined의 타입은 undefined 이고, 값도 undefined 이다. 
- null 의 타입은 object 이다. 
- null 의 타입이 object 라는 버그 때문에, null은 타입이 아니라 값으로 비교를 해야 한다. 

사람이 의도적으로 값을 비워두는 경우 null을 사용하고,
컴퓨터가 값을 설정하지 않았을때  undefined로 나오게 하면 구분하기가 수월하다.



## Primitive 값을 갖는 빌트인 오브젝트

Primitive 값이 있고, Primitive 값을 갖는 Built-in Object 가 있다. 

값이 아니라, 오브젝트이다. 빌트인 오브젝트로서, [[Primitive]] 라는 값을 갖는다.

- Boolean
- Number
- String
- Date



#### [[Primitive]] 

- 내부적으로 [[Primitive]]라는 값을 갖는데 이 대괄호 두개[[ ]]는 자바스크립트 엔진에 의해 생성되었다는 표식이다.
- 이 값은 직접적으로 접근이 불가하며, valueOf연산자로 출력해낼 수 있다.



### 인스턴스 연산하기

인스턴트 자체를 연산할 수 있다. 내부적으로 [[Primitive]]라고 되어있는 대상을 연산한다.

```javascript
const num = new Number(10);
console.log(num + 100); //110;
```





### valueOf()

[[Primitive]]를 키로 가지는 값을 리턴하는 명령어이다.



문자열 원시값은 점(.)키워드가 붙어있으면 내부적으로 new String()을 호출해서 인스턴스를 만든 것과 같이 동작한다.



