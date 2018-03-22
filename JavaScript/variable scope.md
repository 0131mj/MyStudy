# 변수 스코프

## 함수에서의 스코프

```javascript
function add(x,y){
    this.a = x;
    this.b = y;
    this.c = 'c';
    var d = 'd';
    return a + b;

}

add.m = 'm';
console.log(add(3,5)); //8
console.log(add.a); //undefined
console.log(add.c); //undefined
console.log(add.d); //undefined
console.log(add.m); //m
```

- 자바스크립트 함수 내부에 정의된 변수는 지역변수로서, 외부에서 접근이 불가능하다. 
- 단, 유동적으로 추가한 변수(m)의 경우 외부에서 접근이 가능한데 이것은 변수가 다른 스코프에 저장이 되기 때문이다. 