# LHS vs RHS



var a = 2;

```
var a = 2;
console.log(a);
```

var a와

a=2 과정은 별개로 진행된다.



LHS 

- 컨테이너 조회 (변수컨테이너 자체를 찾는다.)
- 변수 할당 또는 메모리에 쓰기.
- strict mode 가 아닌경우, 값을 찾을 수 없으면 새로운 변수를 생성해서 엔진에게 전달
  (strict mode면 값을 찾을 수 없으면 ReferenceError 발생)

RHS 

- 값 조회
- 변수 조회 또는 메모리에서 읽기.
- 값을 찾을 수 없으면 ReferenceError 발생



---

참고출처 : You Don't Know JS, 스코프와 클로저