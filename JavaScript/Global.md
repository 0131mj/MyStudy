# Global

앱상에서 단 하나만 존재하며, 전역객체라고도 한다.  

하지만 Number Object 와 같이 Object의 이름이 Global Object 이므로, 이렇게 부르는 것이 타당하다. 



## 프로퍼티

- NaN
- Infinity
- undefined



## 함수

- isNaN()
- isFinite()
- eval()
- encodeURI()
- decodeURI()



```javascript
var a = 1;
```

a 는 자동으로 글로벌 오브젝트에 등록된다. 

글로벌오브젝트는 실체가 없어, 직접 글로벌 오브젝트를 컨트롤하는 것은 불가능하다.



## Global vs Local

- 함수 안에 작성이 되면 local 함수, local변수가 된다. 



## Global vs window

- Global은 실체가 없으므로 window는 Host Object로서 이를 구현한다. 

