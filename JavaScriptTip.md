label 요소에 click event 적용시 액션이 두번 일어난다.

`e.preventDefault();`

로 해결 가능하다.


### 엘리먼트 스타일 가져오기 및 적용하기
```javascript
document.getElementById("custom_alert").style.marginTop //마진
document.getElementById('custom_alert').clientHeight;  //엘리먼트높이
```



------



### JSON

JavaScript Object Notation 

```javascript
var jsonTxt = '{"A":1}'
console.log(jsonTxt);

var jsonObj = JSON.parse(jsonTxt);
console.log(jsonObj);

var jsonString = JSON.stringify(jsonObj)
console.log(jsonString);
```

#### JSON.parse() 

메소드로텍스트를 오브젝트로 변환 가능하다.

#### JSON.stringify() 

메소드로 오브젝트를 텍스트로 변환 가능하다.



------



