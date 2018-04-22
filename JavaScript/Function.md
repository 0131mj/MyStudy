# Function

함수는 자바스크립트에서 가장 중요한 개념이다. 



## 1. 자바스크립트 함수의 역할

자바스크립트는 단순히 클래스의 메서드 정도의 기능 뿐만 아니라, 훨씬 다양한 기능을 수행한다. 

함수의 역할을 살펴보면 아래와 같이 **3가지 기능**으로 볼 수 있다. 

- 호출 가능한 루틴으로서의 함수
- 값으로서의 함수
  - 인자로 전달 가능
  - 변수에 할당 가능
  - 다른 함수의 반환값으로 할당 가능
- 다른 인스턴스를 생성할 수 있는 요소, 즉 객체타입으로서의 함수

우리가 함수를 정의하면 위에서 정의한 역할을 모두 수행할 수 있는 구조가 메모리에 정의된다. 



## 2. 함수 모델링

자바스크립트는 컴파일을 먼저 수행하고나서 실행을 한다. 

```javascript
function add(x, y){
    return x + y;
}
```

위와 같은 함수가 정해지면, 자바스크립트는 우선 컴파일을 실행을 하게 되는데 아래와 같은 구조로 구성된다. 

- 변수 스코프
  - [+] prototype
  - [-] x
  - [-] y
- 실행코드 블록영역
  - return x + y
- 프로토타입 객체
  - [+] constructor
- 공개변수 영역

간단한 함수를 정의했는데도 이렇게 구조가 복잡한 것은, 앞에서 말한 3가지 기능을 모두 수행하기 위해서다. 

어떤 기능을 수행할 지 모르기 때문에 모든 준비를 갖추고 있어야 한다. 



### 변수 스코프



### 실행코드 블록 영역

### 공개변수 영역

### 프로토타입 객체

### 영역 접근 방법



## 3. 함수를 정의하는 3가지 방법

### 함수 정의

### 함수 리터럴

### Function 생성자 사용



## 4. 함수 인자 - arguments, callee

### arguments

```javascript
add(a,b){
    a+b
}
add(1,2);
```





```mermaid
graph LR
add실행 -- Arguments객체 --> add함수
```

### argument.callee

callee 속성은 현재 실행되고 있는 함수(함수 객체)를 나타낸다.

이것은 마치 생성자 안에서 사용되는 this와 같다. 



```mermaid
graph BT
실행코드블록(실행코드블록) -.->|argument.callee| 함수
실행코드블록 -.->|this| 객체
```

### 

## 5. Fuction

### Function vs function

- Function : 함수 인스턴스를 생성하는 생성자 함수
- function : 함수 인스턴스

```javascript
var add = new Function('x', 'y', return x+y);
```

위와 같이 Function 함수를 통한 함수 생성은 잘 사용하지 않는다. 그 이유는 실행코드블럭이 길거나 줄바꿈이 있으면 쓰기 불편하기 때문이다.

 

### Function VS. Object, Array



> Object와 Array도 Function의 인스턴스다.
>

Object와 Array 생성자도 Function의 인스턴스로서, Function에서 정의한 기본적인 멤버를 사용할 수 있다. 

 

Function =생성 => 함수객체 f

Function =생성 => 함수객체 Object

Function =생성 => 함수객체 Array



정리하자면 다음과 같다. 

Function 생성자 함수 ->Object 생성자 함수 (Function인스턴스)->Object 객체(Object 인스턴스)

그러니까 모든 생성자 함수는 함수의 인스턴스인 것이다.

Object생성자 함수, Number생성자함수도 Function생성자 함수로 만들어진 인스턴스이다.  



하지만 결국 자바스크립트를 끝까지 파보면 object에 직면하게 된다. 

```javascript
console.log(typeof(Function.__proto__.__proto__)) // object
```

이 생성자 함수의 프로토타입은 function이고, function의 프로토타입은 object인것이다.



## 6. 함수 객체



## 7. 익명 함수

## 8. 중첩 함수

## 9. 콜백 함수