# FlexBox

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