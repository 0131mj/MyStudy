# overflow

부모요소의 크기보다 자식요소의 크기가 클때, 이것을 제어하기 위해서 사용하는 속성이다.

흔히, float로 지정되어 있는 대상의 영역을 잡기위해서 사용하는데 원래의 목적이 그런 것은 아니다. 



## 속성

- visible
- hidden
- scroll
- inherit
- auto : 기본



overflow의 규약에는, "hidden" 과 "scroll" 에 관한 특례가 있다. 

그 특례란 , 이 두 속성을 사용했을 때 새로운 BFC를 만들어낸다는 것이다.



## body

- 원래 float는 DOM 상에서 둥둥떠있는 요소이기 때문에, 부모는 float 된 자식의 높이를 읽을 수 없다. 
- 하지만 특별하게도, 도큐먼트의 최상위 엘리먼트인 body는 float된 요소의 높이를 읽어낼 수 있다. 



## body 스럽게 만들기

- overflow 속성을 주는 것은 개체를 body 化 하는 것이다. 
- 즉, 작은 body를 만들어주는 것과 같다. 
- 이것은 block formatting context를 말한다.



## block formatting context

- 블록요소가 그려질 수 있는 환경을 담당하는 요소

- 즉, 새로운 영역을 시작한다는  것이다. 
- margin 겹침현상도 제거할 수 있다. 원래 마진은 겹친다. 부모의 마진으로 둘러쌓여져 있다면, 부모의 마진과 자식이 마진을 비교해서 큰걸로 적용이 되어버리는데, 부모를 block formatting context 로 만들어버리면, 자식은 그 안에서 자신의 마진 여유공간을 가진다.



## 정리

- 요소에 overflow를 적용한다는 것은, block formatting context로 만들어준다는 것이다.