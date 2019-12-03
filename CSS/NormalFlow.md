# Normal Flow

CSS 포지션 속성은 아래와 같이 5개로 볼 수 있다. 

- **static**
- **relative**
- absolute
- fixed
- inherit



이 중에서, static 과 relative 만이 normal flow에 해당한다.



## Normal flow

Normal flow 상에서는 높이와 위치등을 자동으로 잡아주는 등의 속성이 저절로 적용된다. 

- BFC : Block Formating Context
- IFC : InlineFormating Contexts
- Relative Positioning



## Block Formating Context

### Block의 특징

- 부모의 width를 다먹는다. 즉, 아래와 같은 속성을 자동으로 갖는다.
  - width: 부모의 width 
  - height: 자식들의 높이의 합
  - x : 0
  - y : 형제중에서 앞에 있는 것들의 높이의 합



## Inline Formating Context

### Inline의 특징

- 줄바꿈 : 부모의 width를 자식이 초과하면 줄바꿈이 된다. 
  - height: 현재 line을 구성하고 있는 요소중에서 가장 큰 높이가 lineHeight 가 된다.
  - x: 앞요소가 끝나는지점이 현재 엘리먼트의 x값이된다.
- BFC 가 나타나면 IFC는 종료된다.





## word-break 속성

- HTML은 문자열에 공백이 없다면, 하나의 덩어리진 inline으로 본다.

- work-break 속성을 주는 순간, 이 문자열은 문자자체가 하나하나의 inline 요소가 된다.  

  따라서 수십개의 inline geometry 로 분할된다. 결론적으로 브라우저는 느려질 수 있다.

- 