# Symbol

- Symbol 은 ES6 에서 추가된 feature 로, Primative type 이다. 
- Symbol 은 new Symbol 로 구현할 수 없고, Symbol() 을 사용한다. 

```javascript
const s = Symbol();
```





## 선언방식

```javascript
const iterable = {
    [Symbol.iterator]: // 이렇게 쓰는 대신
    ['@@iterator']: // 이렇게 쓰거나
    '@@iterator': // 이렇게 써도 된다.
}
```

- Well-knowned Symbol 은 @@~ 로 대체가 가능하다. 
- 하지만 문자열로 사용하는 것은 향후 변경될 소지가 있으므로, 사용을 권장하지 않는다.