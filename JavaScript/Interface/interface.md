# interface

여기서 인터페이스란, 자바스크립트에서 한정지어서 정의하는 개념으로, 다른 언어의 interface 개념을 그대로 말하는 것은 아니다. 



## 정의

- 사양에 맞는 값과 연결된 속성 키의 셋트 
- 어떤 Object라도 인터페이스의 정의를 충족시킬 수 있다. 
- 하나의 Object는 여러 개의 인터페이스를 충족시킬 수 있다. 



## 예시 : 인터페이스 테스트 



#### 요구조건

- test 라는 키를 갖고, 
- 값으로 문자열인자를 1개 받아, boolean을 반환하는 함수가 온다. 



#### 구현결과 - object

```javascript
const testInterface = {
  test: str => {
    return typeof str === "string";
  }
};
```



#### 구현결과 - class

```javascript
const Test = class{
    test(str){
        return typeof str === "string"
    }
};

const test = new Test();
```

---

##### 참고개념 : Duck Typing

- 자바스크립트와 같은 동적언어에서는 어떤 클래스로 생성한 특정 인스턴스가 인터페이스를 구현하고 있다고 보장해주지 않는다.  이를 보장하는 유일한 방법은 상속구조를 통해 throw를 던지는 수 밖에 없다. 
- 런타임 타입체크가 되지 않으므로, 실제 요구사항이 기능하기만 하면 내부 구조의 완결성과 상관없이 인터페이스가 구현된 것으로 보는 시각
- 파이썬에서 유래한 용어. 



## 종류 

자바스크립트의 SPEC 상에서는 현재 (2019년 8월 기준) 18개 정도의 자체 인터페이스를 규정하고 있다.

- itearble
- iterator
- 기타 등등 ...



---

참고 : https://youtu.be/GhAkc00TvZs

http://www.ecma-international.org/ecma-262/6.0/#sec-iterator-interface