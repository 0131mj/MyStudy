# call vs apply vs bind

Function.prototype에는 이 세 메소드가 등록되어 있다. 

따라서 모든 함수는 call, apply, bind를 사용할 수 있다. 

- call 이나 apply는 거의 비슷하다. 

- call은 실행할 때의 컨텍스트를 바꾸는 것이고, bind 는 해당 함수를 고정으로 박아둔 함수 자체를 만들어내는 것이다.

- 한계 : call 과 apply 로는 생성자의 인자로 사용할수 없다. 



## call()

Function.prototype에 call이 등록되어 있고, 모든 함수는 Fuction.prototype을 상속하므로

모든 함수는 functionName.call()의 형식을 사용할 수 있다. 

즉, 함수이름 뒤에 붙어서 사용하는 것이 call이다. 



call에서 매개변수를 전달해주면

이제 functionName에서 사용하는 this는 해당 매개변수를 가리키게 된다. 

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
- arguments는 아래와 같이 여러개가 들어갈 수 있다. ( 단, 첫번째 인자는 this로 사용할 값을 넣는다. )



```javascript
var obj = {num: 2}
var addToThis = function(a, b, c){
    return this.num + a + b + c;
}
addToThis.call(obj, 1,2,3)   // 2 + 1 + 2 + 3
```





## apply

```javascript
var obj = {num: 2}
var arr = [1,2,3]
var addToThis = function(a, b, c){
    return this.num + a + b + c;
}
addToThis.apply(obj, arr); // 8
```

apply 는 두번째 인자를 배열로 받는다는 점만 다르다.



## bind

this로 사용할 값을 고정해버린다. 