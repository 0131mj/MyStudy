## Array

배열

자바스크립트에서는 배열을 대괄호로 표기한다. 

```javascript
var colorArray = ['orange', 'yellow', 'green']
```



## 배열 VS 객체

여러 원소들을 담고 있다는 점에서 배열과 객체는 비슷해보인다. 

객체와 배열은 공통점도 있지만 차이점도 있다. 



### 공통점

#### 1. 둘 다 객체다. 

객체도 객체고, 배열도 객체다. 배열은 배열객체라고 부른다. 





### 차이점

#### 1. 괄호 표기방식

배열은 대괄호, 객체는 중괄호를 사용한다. 

```javascript
var colorArray = ['orange', 'yellow', 'green']
var colorObject = {
    '0' : 'orange',
    '1': 'orange',
    '2': 'orange'
}
```



#### 2. 인덱스 

배열의 인덱스는 기본적으로 숫자이다. 하지만 텍스트를 인덱스로 가질 수 있다. 

객체의 인덱스는 텍스트이다. 객체의 인덱스는 '키'라고 부른다. 



#### 3. 멤버와 메서드

배열은 객체를 상속받아서 만들어진다. 

따라서 배열은 객체에서 쓰는 멤버와 메소드를 다 쓸 수 있지만, 객체는 배열에 있는 멤버와 메소드를 사용할 수 없다. 

- 배열객체에서만 사용가능한 메서드 : .push(), .pop, ......
- 배열객체에만 존재하는 프로퍼티 : .length





## 유사 배열객체

'length' 라는 프로퍼티를 객체 안에 인위적으로 만들어주면 객체를 배열처럼 사용가능하다. 

단, 바로 사용할 수는 없고 apply()메서드를 사용해야만 한다. 

```javascript
var obj = {
    name : 'test',
    length : 10
}
Array.prototype.push.apply(obj, ['newTxt']); //11
```

### 배열을 스트링으로 변환하기

```javascript
var arr = [A, B, C];
var arrString = arr.join(", "); //A, B, C
```

### 중복 제거하기

```javascript
var uniqArray = Array.from(new Set(duplicateArray));
```



### 배열인지 유사배열인지 확인하는 방법

```javascript
Array.isArray(배열)
```





##  배열관련 함수

- push : 마지막에 추가
- pop : 마지막 것 뽑기
- unshift : 처음에 추가
- shift : 처음 것 뽑기 

pop 과 shift 를 쓰면, 원본 배열에서 배열의 원소가 삭제된다





배열을 문자로 만들 때 join 

문자를 배열로 만들 때 split



객체를 배열로 만들기

## Object.entries