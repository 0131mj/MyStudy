# Event

Capture, Bubbling, Propagation,  Once



addEventListner 에는 3번째 파라미터를 넣을 수 있는데, 옵션이 적용 가능하다. 



e.stopPropagation(); 

이벤트 버블링업 방지



## label 요소에 클릭 이벤트 적용

label 요소에 click event 적용시 액션이 두번 일어난다.

`e.preventDefault();`

로 해결 가능하다.




## 엘리먼트 스타일 가져오기 및 적용하기
```javascript
document.getElementById("custom_alert").style.marginTop //마진
document.getElementById('custom_alert').clientHeight;  //엘리먼트높이
```



## backspace의 키도 이벤트로 먹이고 싶을때

- keypress 대신 keyup을 사용하면 모든 키를 이벤트로 받을 수 있다. 

```javascript
review_txt.addEventListener('keyup', function () {
    count_txt_update();
});
```

