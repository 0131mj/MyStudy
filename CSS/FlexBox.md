# FlexBox

플렉스박스는 CSS3에서 등장한 기능으로,  종래에 쓰던 float를 대체하는 기능이라고 볼 수 있다. 

컨테이너와 아이템, 두 종류에 따라 쓰이는 속성이 다르다. 





## 컨테이너에서 쓰이는 속성

- flex-direction : 진행방향 결정
  - justify-content : 진행방향에서의 배치 결정
    - align-items : 진행방향의 수직방향에서의 배치 셜정 
- flex-wrap : 진행방향으로 가다가 넘치면 다음줄로 흐르게 할건가 
  - align-content : flex-wrap 상태에서, 흐를때 정렬을 어떻게 할 것인가.



### flex-direction 

- 배열의 방향, 즉 어느 방향으로 늘어놓을 것인가를 결정한다. 

#### 하위 속성

- row : 텍스트방향(가로)
- row-reverse : 텍스트 반대방향
- column : 텍스트 수직방향
- column-reverse : 텍스트 역수직방향 (세로)



### justify-content

- 해당 방향에서 공간을 어떻게 나눌 것인가를 나타낸다. 
- align-items와 쌍을 이루는 속성으로, justify-content가 수직을 결정하게 된다면 align-items는 수평분할을 결정한다. 

```css
.element{
    display : flex;
   	justify-content : flex-end;
}
```

#### 하위속성 

- flex-start : 옛날에 쓰던 float left와 비슷하다. 시작점으로 요소들을 몬다. 
- flex-end : 옛날에 쓰던 float right와 비슷하다. 마지막점으로 요소들을 몬다. 
- space-between : 양측정렬이다. 양끝으로 요소들을 몰아서 배치하고 균등분할 한다. 
- space-around :  "하나의 요소가 공간을 둘러싼 부분의 여백"이 똑같도록 균등분할 한다.
- space-evenly : 이것은 모든 여백이 동등한 간격을 가지도록 분할한다. space-around와 조금 헷갈리지만, 완전한 균등여백 분할이라고 보면된다. 





### flex-flow



## 아이템에서 쓰이는 속성



### flex-grow

- flex-direction에서 여백을 차지하는 비중을 설정한다. 
- 1000px의 공간의 하위 요소 너비가 각각 300, 100, 200 이고, 이 상태는 400이 남은 상태이다. 1:2:1로 비율을 줘버리면 나머지 400을 1:2:1의 비중으로 갖고간다. 



### flex-basis 

- 원래의 여백이 얼마나 되는가를 지정
- auto : 기본 자기 값,
- 0으로 설정하고 flex-grow를 설정하면, 기본값이 없이 flex-grow에만 참조해서 가져운다. 

## order

- 형제중에서 우선순위를 부여하는 속성이다. 





### flex

플렉스에 숫자를 주면 flex-basis가 0으로 자동으로 바뀐다. 