# call vs apply vs bind

- call 이나 apply는 거의 비슷하다. 

- call은 실행할 때의 컨텍스트를 바꾸는 것이고, bind 는 해당 함수를 고정으로 박아둔 함수 자체를 만들어내는 것이다.

- 한계 : call 과 apply 로는 생성자의 인자로 사용할수 없다. 

  ## 

## call()

모든 함수는 call이라는 메소드를 갖고 있다.  call의 매개변수로 인자를 전달해주면 this는 call 안에 들어있는 매개변수를 가리키게 된다. 

```javascript
var a = { first : 10, second : 20 }
var b = { first : 30, second : 50 }

function sum(){
    return this.first +this.second
}

var aResult = sum.call(a); // this : a
var bResult = sum.call(b); // this : b

console.log(aResult); // 30
console.log(bResult); // 80
```



다른 방식의 예제를 보자.

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



## bind

this로 사용할 값을 고정해버린다. 