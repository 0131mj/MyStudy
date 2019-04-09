# Object 객체

객체와 함수는 자바스크립트에서 가장 중요한 개념이다. 

- 객체
  - 함수
  - 배열
- 숫자
- 문자
- 불린
- null
- undefined



## 내장객체 

내장객체의 경우, 첫글자가 대문자이면 생성자로 사용가능하다. 

### window 객체 

- document : JavasScript 언어와 HTML 언어 간의 통역사의 기능을 한다. 
- alert  : 원래의 정체는 window.alert이다. 
- console.dir() : 객체 형식으로 출력하기 
- console.dir(document)



### Math.random

완벽한 랜덤은 아니다??



### String(숫자) 

숫자를 문자로 바꿔줌





## 객체를 반복하여 나타내는 방법

```javascript
for (key in obj){
    console.log(key, obj[key])
}
```



### 