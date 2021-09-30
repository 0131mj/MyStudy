# Symbol

- Symbol 은 ES6 에서 추가된 feature 로, Primative type 이다. 



## 생성하기

```javascript
const s = Symbol();
```

- Symbol 은 new Symbol 로 구현할 수 없고, Symbol() 을 사용한다. 
- 이는 symbol 이 primative type 이기 때문이다.
- 인자로 문자열을 넣을 수 있는데 이는 이 심볼에 대한 설명을 적어놓는 역할을 한다.



### 전역 심볼 : Symbol.for(key)

- key를 키로 갖는 유일한 심볼을 생성할 수 있으며, 전역에서 공유해서 사용할 수 있다. 
- 이렇게 만든 심볼은 Symbol.keyFor(symbol)  명령어를 통해 key 문자열을 조회해낼 수 있다.



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