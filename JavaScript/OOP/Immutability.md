# Immutability 불변성



## 복사하기

참조값인 객체의 의도치 않은 변화에 의한 사이드이펙트를 줄이는 방법으로는 우선 객체의 복사가 있다.



#### 얕은 복사

```javascript
Object.assign({}, o1)
```



#### 깊은 복사



배열의 복사

```javascript
const arr = [1, 2, 3];
const arr2 = arr.concat();
```



## Object.freeze() 객체 얼리기

- const 와 다른 점은, 객체의 값을 못바꾸도록 한다는 점이다.
- 낮은 수준에서만 된다. (내부의 객체는 얼리지 못한다.)