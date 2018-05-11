# 제너레이터

호출시 리턴 값 대신, 제너레이터의 인스턴스를 리턴함

```javascript
function * counter(){
    return 1
}
value = counter()
console.log(value.constructor);
```

