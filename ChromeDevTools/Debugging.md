# Debugging



## 프로그래밍에서 에러의 종류

- 문법적 오류 (Syntax Error) : 해당구문이 실행이 되지 않아 쉽게 발견, 수정을 할 수 있다. 
- 논리적 오류 (Semantic Error) : 실행은 되지만 의도한 결과가 나오지 않을 경우 오류의 발견과 수정이 어렵다. 



## 디버깅 툴의 사용

- 디버거를 사용하면, 실행하는 코드의 원하는 부분에 도달했을 때 실행을 잠시 멈추고, 해당 시점에서 변수의 값이나 상태를 확인함으로써 의도치않은 프로그램 실행의 결과의 원인을 쉽게 알아낼 수 있다. 



## SourceTab의 활용

### 실행을 제어하는 4가지 버튼

- Step out :  현재 실행중인 함수를 벗어난다. 해당함수를 종료될 때까지 실행하고 리턴된 곳으로 이동한다.
- Step into : 함수 안에서 실행시, 해당 함수 안으로 들어간다. 
- Step over : 함수에서 호출이 일어났을 때 함수 안으로 들어가는 대신, 건너뛴다. 

- Resume :  프로그램을 재개한다.  위의 3개 버튼이 한단계 한단계 진행되는 것과 달리 프로그램을 계속 쭉 진행시킨다. 

```javascript
function innerFunction (){
    console.log("innerFunction"); //CASE2. Step into
}
for(var i = 0; i < 2; i++) { //CASE1. Step over
    innerFunction(); // breakPoint 실행
}
```

- 만일 위의 코드에서  브레이크포인트가 걸려있는 상황에서 spep into를 클릭하면 텍스트의 함수의 안으로 진입을 하고, step over를 누르면 건너뛰고 for문을 다시 실행한다. 

---

위의 내용은 youtube 강의를 바탕으로 작성했다. 

https://www.youtube.com/watch?v=ROzGWHOvEVs

