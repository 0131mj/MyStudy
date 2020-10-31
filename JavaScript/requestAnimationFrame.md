# requestAnimationFrame

(CSS3가 아닌) 자바스크립트로 애니메이션을 만드는 데는 3가지 방법이 있다. 

1. while 문을 사용하여 끝날 때까지 애니메이션을 수행
2. setTimeout을 여러번 호출
3. setInterval을 사용하여 프레임마다 애니메이션 수행



## raf

requestAnimationFrame은 몇가지 특징을 갖고 있다. 

1. 실행 : 재귀를 사용한 무한루프
2. 장비에 대한 이해
3. 실행환경의 차이 : vs setTimeout



### 1. 실행 : 재귀를 사용한 무한루프

raf 는 단 한개의 프레임을 실행해주기 위한 함수이다. 즉, 그림 한장을 그려주는 명령이다. 

따라서 여러번 호출을 해줘야 하는데, 주로 재귀를 사용한다. 



#### 의문) 재귀를 사용하지 않고 여러번 호출이 가능한가?

- while 문으로 사용하면 된다. 
- setInterval 을 수행할 때, 주기를 입력해주면 끝나지 않는 한 계속 호출해준다. 



### 2. 장비에 대한 이해 및 성능

raf 는 현재 브라우저의 모니터 주사율에 대해 알고 있다. 

따라서 낭비 없이 애니메이션을 효율적으로 출력해준다.



### 3. 실행환경의 차이

콜백큐에서 처리하는 영역이 다르다. 

### setInterval

- 별도쓰레드의 타이머로 움직임

- 실행 : 
  - callStack => 
  - Background =>
  - **Macrotask** (repaint 필요시: 직접 코드에 스타일 관련 속성을 기재했을 경우만 수행)



### raf

- engine work 에서 렌더링이 끝난 시점에 직접 발생시킴 (즉, 렌더링과 일치)
- 실행 : 
  - callStack => 
  - Background => 
  - **AnimationFrame** (repaint 항상 수행)



---

참고

http://www.javascriptkit.com/javatutors/requestanimationframe.shtml







callback