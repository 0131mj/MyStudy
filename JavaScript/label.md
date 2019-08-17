# label



## 명령 흐름 제어

- 초기의 프로그래밍은 "명령을 처음부터 끝까지 수행하고 종료"하는 방식으로만 이뤄졌다.  
- 하지만 이 흐름을 제어할 수 있는 기능이 필요해졌다. 특정위치로 되돌아가거나 점프를 하려는 필요성이 생긴 것이다.  이때 등장한 goto 라는 명령은, 몇번째 줄로 이동하라는 식으로 작동했다. 
- 그 뒤에 등장한 것이 label이다. label 은 프로그래밍 코드에 어떤 지점을 명시하여 그 쪽으로 다시 돌아가라고 명령해주는 기능이다.



## label, break, continue

- label : 같은 "스코프" 내에서 중복선언이 불가
- break : 모든 레이블 구문에서 사용가능
- continue : 반복레이블 구문에서만 사용가능





## 문에 따른 label 및 탈출 구문 적용



### 1. label set : 명시적인 label 필요

```javascript
abc : {
    log('a');
    break abc;
    log('b');
}
log('c');
```

- 중괄호 앞에 레이블이 붙어있어서 하나의 블록을 형성한 덩어리를 레이블 셋이라고 부른다. 
- label set 에서는, break 문 뒤에 label identifier를 생략할 수 없고 "abc" 라고 명시적으로 적어줘야 한다.
- continue 문은 사용할 수 없다.



### 2. iteration set : 자동 label 적용

```javascript
for (const i of [1, 2, 3, 4]){
    if(i === 3) break;
}
```

- 위의 예시에서는 break 뒤에 identifier 가 없다.  iteration set 에서 자동으로 label 을 생성한 것이다. 
- 원래는 break 뒤에 명시적으로 label을 붙여주는 것이 맞지만, 맥락에따라 break는 label을 자동으로 찾아서 붙여준다.
- continue 문은 iteration set 에서만 작동한다.