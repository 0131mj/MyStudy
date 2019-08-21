# arrow function

화살표 함수가 종래의 함수와 구별되는 확연한 차이점은, 내부의 변수를 어떻게 다루느냐에서 드러난다. 



#### es6 이전

```javascript
function (){
    arguments // 지역변수
    location // 전역변수
    this // 동적 컨텍스트
}
```



#### es6 이후 

```javascript
() => {
    arguments // 자유변수
    location // 전역변수
    this // 자유변수
}
```

