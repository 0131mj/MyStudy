# 제너레이터

```javascript
function * counter(){
    yield 1
    yield 2
    yield 3
}

const g = counter()

console.log(g.next())
console.log(g.next())
console.log(g.next())
console.log(g.next())

/*실행 결과*/
{value: 1, done: false}
{value: 2, done: false}
{value: 3, done: false}
{value: undefined, done: true}
```

- ES6에 추가된 문법으로, 일반적인 함수 정의와 다르게 " * "를 붙여서 사용한다. 
- next()는 제너레이터 객체에 내장된 함수로, yield까지의 부분이 실행되고,  next()를 호출 하는 쪽에 yield의 value와  함수가 끝났는지를 확인하는 정보가 반환됨.