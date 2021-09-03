# Array

배열은 자료가 나열된 컬렉션이다. 



##  배열 관련 함수



### 1. 생성

- new Array() : new 연산자에서 생성자 함수를 호출하여 인스턴스 생성
- Array() : new 직접 생성자 함수를 호출하여 인스턴스 생성


#### Array.from()

- 내장객체 Array의 static 메소드로, 유사배열 혹은 이터러블을 얕게 복사하여 새로운 Array를 만들어준다.



### 2. 추가와 삭제

- push : 마지막에 추가
- unshift : 처음에 추가
- pop : 마지막 것 뽑기 (원본배열에서 원소 삭제)
- shift : 처음 것 뽑기  (원본배열에서 원소 삭제)
- delete : 해당 인덱스 비움(값을 undefined로 초기화)
- splice : 해당 인덱스 삭제 (요소를 완전히 삭제)

> splice(start, deleteCount, item)
>
> - start : 삭제를 시작할 인덱스
> - deleteCount : 삭제할 요소의 수
> - item : 삭제할 위치에 추가할 요소
>
> splice의 명세를 보면 삭제 뿐만 아니라 교체도 가능하다. 



### 3. 열거

배열을 열거해야 한다면, for in 문보다는 그냥 for 문을 쓰는 것이 바람직하다. 

for문은 인덱스만 열거하는 데 비해, for in 문은 안에 들어있는 쓸데없는 것들도 열거를 해버린다. 



### 4. 정렬 

#### Array.prototype.sort() 

sort는 Array를 unicode값에 따라 순서대로 정렬한다. 

'두 값을 받아서 정수를 반환하는 함수'를 콜백으로 작성할 수 있는데 앞에서부터 순서대로 계산해간다.

[0,1], [1,2], [2,3]... 이런식이다. 이때 콜백함수의 결과값이 0보다 크면 인덱스의 값을 교체한다. 

교체가 없을때까지 계속 루프를 돌린다. 



##### 콜백을 받아서 정렬하는 함수 직접 구현하기 (유니코드 포인트 제외)

```javascript
const sort = (arr, callback) => {
    let changed;
    do {
        changed = false;
        for (let i = 0; i < arr.length - 1; i++) {
            const prev = arr[i];
            const next = arr[i + 1];
            const res = callback(prev, next);
            if (res > 0) {
                changed = true;
                arr[i] = next;
                arr[i + 1] = prev;
            }
        }
    } while (changed)
	return arr;
}

const callback = (a, b) => a - b;
const result = sort([1, 2, 98, 0, 3920, 4, -6], callback);
console.log(result); // [-6, 0, 1, 2, 4, 98, 3920]
```



### 5. 순회

아래의 메소드들은 콜백으로 순회를 한다.

이 중 상위의 다섯개 메소드는 현재 아이템, 인덱스 배열 전체를 루프의 인자로 사용한다.

- forEach()
- every()
- some()
- map()
- filter()
- reduce()
- reduceRight()



#### forEach

- 시맨틱적으로, forEach는 Array 내부에서 반복가능한 모든 요소를 순회함을 나타낸다.
  따라서 break와 continue는 사용할 수 없으며, 예외시 throw만 가능하다.
  뒤에서 앞으로 읽을 수 도 없고, 인덱스 증가값을 조정할 수도 없다. 
- forEach는 순회를 시작할때 반복의 범위가 결정되므로 엘리먼트를 추가해도 처리가 되지 않는다. 
  (하지만, 순회도중 현재 인덱스보다 큰 인덱스의 아이템을 삭제를 하거나 값을 변화할 경우,  변화가 적용된 채로 순회를 계속한다.)

```javascript
var list = ['a', 'b'];

var fn = function(item, index, arr){
    console.log(item, index, this.name);
}

list.forEach(fn, {name: "zzz"})
```

- forEach의 두번째 인자로 this로 참조할 object를 삽입할 수 있다. 

- 콜백함수는 재사용성을 위해 위와 같이 독립적으로 선언해두는 것이 바람직하다.



forEach 도중에 삭제를 하면 해당 인덱스는 empty로 바뀐다. empty는 Enumerable한 대상이 아니므로, 순회에서 제외된다. 

- 만일 new Array(10) 과 같이 인스턴스를 생성하더라도, length 가 10이라고 해서 10번 순회할 것이라고 카운트를 보장할 수 없다. 
- 반면 for 가 제어하는 것은 Array와 상관없는 array로 추출해낸 숫자이기 때문에, length 만큼 순회하는 것이 보장이된다. 



#### forEach vs for

forEach는 Array의 메소드이고 for는 문이다. 



### 문자와 배열

- 배열을 문자로 만들 때 join 

- 문자를 배열로 만들 때 split



### 배열을 스트링으로 변환하기

```javascript
var arr = [A, B, C];
var arrString = arr.join(", "); //A, B, C
```



### 중복 제거하기

```javascript
var uniqArray = Array.from(new Set(duplicateArray));
```



### 배열인지 확인

- 유사배열의 여부도 확인 가능하다.

```javascript
Array.isArray(배열)
```



## 배열 VS 객체

### 1. 공통점

여러 원소들을 담고 있다는 점에서 배열과 객체는 비슷해보인다. 

#### 1) 둘 다 객체다. 

객체도 객체고, 배열도 객체다. 
배열은 배열객체라고 부른다. 

의외의 사실은, 배열도 arr['text'] 이런 식으로 키가 스트링으로 추가될 수 있다는 점이다. 

(하지만 length는 숫자를 기준으로만 판단한다. )





### 2. 차이점

#### 1) 괄호 표기방식

배열은 대괄호, 객체는 중괄호를 사용한다. 

```javascript
var colorArray = ['orange', 'yellow', 'green']
var colorObject = {
    '0' : 'orange',
    '1': 'orange',
    '2': 'orange'
}
```



#### 2) 인덱스 

배열의 인덱스는 기본적으로 숫자이다. 하지만 텍스트를 인덱스로 가질 수 있다. 

객체의 인덱스는 텍스트이다. 객체의 인덱스는 '키'라고 부른다. 



#### 3) 프로토타입

- Array  >  Array.prototype  >  Object.prototype
- Object > Object.prototype 



#### 4) 멤버와 메서드

배열은 객체를 상속받아서 만들어진다. 

따라서 배열은 객체에서 쓰는 멤버와 메소드를 다 쓸 수 있지만, 객체는 배열에 있는 멤버와 메소드를 사용할 수 없다. 

- 배열객체에서만 사용가능한 메서드 : .push(), .pop, ......
- 배열객체에만 존재하는 프로퍼티 : .length





## 유사 배열객체

'length' 라는 프로퍼티를 객체 안에 인위적으로 만들어줄 수도 있다. 

이처럼 객체안에 length 프로퍼티가 있는 객체를 유사배열객체라고 부른다.

유사배열 객체는 객체를 배열처럼 사용할 수 있는데, 표준 배열메서드를 바로 사용할 수는 없고 apply()메서드를 사용해야만 한다. 

```javascript
var obj = {
    name : 'test',
    length : 10
}
Array.prototype.push.apply(obj, ['newTxt']); //11
```

