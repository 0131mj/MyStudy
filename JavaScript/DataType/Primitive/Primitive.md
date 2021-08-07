# Primitive 원시값

Primitive 값이 있고, Primitive 값을 갖는 Built-in Object 가 있다. 



## Primitive 값

더 이상 쪼갤 수 없는 값이다. 

개발자도구에서 출력해보면 값 그자체로 찍힌다. 

- boolean
- number
- string

- null

- undefined



## 프리미티브 값을 갖는 빌트인 오브젝트

값이 아니라, 오브젝트이다. 빌트인 오브젝트로서, [[Primitive]] 라는 값을 갖는다.

- Boolean
- Number
- String
- Date



#### [[Primitive]] 

- 내부적으로 [[Primitive]]라는 값을 갖는데 이 대괄호 두개[[ ]]는 자바스크립트 엔진에 의해 생성되었다는 표식이다.



### 인스턴스 연산하기

인스턴트 자체를 연산할 수 있다. 내부적으로 [[Primitive]]라고 되어있는 대상을 연산한다.

```javascript
const num = new Number(10);
console.log(num + 100); //110;
```





### valueOf()

[[Primitive]]를 키로 가지는 값을 리턴하는 명령어이다.