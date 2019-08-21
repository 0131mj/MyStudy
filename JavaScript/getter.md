# Getter

ES6 이후에는, 괄호가 붙어있지 않다고 해서 해당 구문이 함수실행이 아니라는 것을 보장 할 수 없다.  

```javascript
const obj = {
  get a(){
    window.alert("A!!!")
  }
}

obj.a;
```

위의 실행문은 함수가 실행되어버린다.
