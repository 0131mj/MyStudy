# Position

어떤 특정 gemetry 속에서 left, top 등을 결정하는 룰을 지정하는 방식(계산식)

- static: 기본값
- relative
- absolute
- fixed
- inherit



## static

- 기본



## relative

일반적으로 static으로 그려나가던 flow상에서, position absolute를 가두기 위한 container로 사용된다. 

### 그려지는 방식

- static으로 먼저 개체를 그리고, 붕 떠서 다시 지정된 위치에 다시 그려준다.

### static vs relative

- relative 가 위로 올라온다. 
- relative 끼리는 z-index 가 경합을 벌인다. 



## absolute



### 기준

- absolute는 부모중에서 static이 아닌 요소를 기준으로 한다. 
- relative, absolute, fixed 세가지 속성을 가진 개체가 부모가 될 수 있다. 
- 부모중에 relative, absolute, fixed 가 없다면 body 가 기준이 된다. 



### 기본값

- 0, 0 이 아니다.
- offset parent와는 무관하게, 부모DOM의 위치를 기준으로 한다. 
- 즉, left와 right를 주지 않으면 부모가 static이라고 하더라도, 그 위치를 기본값으로 잡는다.
- left와 right 속성을 주었을때 비로소 부모로부터 벗어나 offset Parent를 찾아서 그 엘리먼트를 기준점으로 삼는다. 
- 다른말로 표현하자면, left와 right는 offset parent 를 기준으로 자기의 값이 어떻게 될지를 결정하는 속성인 것이다.
- left, top 속성은 position이 static인 개체에서는 무시된다. 왜냐하면 position 이 static인 경우 normal flow의 규칙에 따라 그려지기 때문이다. 



### 부수효과

- absolute로 만들어진 개체는 width가 자동으로 100%가 아니게 된다. 





----



## left, top의 3가지 맥락

- static 에서의 left, top : 무시
- absolute에서의 left, top : offset parent로부터의 거리
- relative에서의 left, top: normal flow로 그려졌을때의 차이값







헷갈리는 개념들 정리하기

- margin-left vs left
- fixed vs absolute
- padding vs margin
