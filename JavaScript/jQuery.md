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

