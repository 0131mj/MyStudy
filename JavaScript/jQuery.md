## 동적으로 추가한 엘리먼트

*** on을 사용하면 되기는 하지만, document 자체에 걸어줘야 제대로 작동함


* 작동함.

```javascript
$(document).on("click",".order_up",function(){
    console.log("order_up click!!");
});
```




* 작동안함.

```javascript
$(".order_up").on("click",function(){
  console.log("order_up click!!");
});
```



## ready vs load

- 순서 : ready가 먼저 실행되고, load는 나중에 실행됨.
- 아래 코드와 같이 load를 먼저 써주더라도 documentReady 창이 먼저 뜸.

```javascript
$(window).on('load',
	function () {
		alert('windowOnload');
	}
);

$(window).ready(
	function () {
		alert('documentReady');
	}
);
```

