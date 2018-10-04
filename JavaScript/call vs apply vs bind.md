# call vs apply vs bind

- call 이나 apply는 거의 비슷하다. 



# call

> 형식 : function.call(obj, functionArguments)

```javascript
var obj = {num: 2}
var addToThis = function(a){
    return this.num +a
}
addToThis.call(obj, 3)
```

- obj라는 객체에는 메소드가 없고, 

- addToThis에는 this.num이 없다. 
- 하지만 call 이라는 함수를 이용하면 이 둘을 엮어줄 수 있다. 



- arguments는 아래와 같이 여러개가 들어갈 수 있다. ( 첫번째 인자는 대상객체가 들어가야 하지만)

```javascript
var obj = {num: 2}
var addToThis = function(a, b, c){
    return this.num + a + b + c;
}
addToThis.call(obj, 1,2,3)
```



## apply

```javascript
var arr = [1,2,3]
var addToThis = function(a, b, c){
    return this.num + a + b + c;
}
addToThis.apply(obj, arr); // 8
```

이거 말고는