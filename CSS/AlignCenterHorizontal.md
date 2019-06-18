# Align Center Horizontal

가운데로 정렬하기





## text-align : center

- 인라인 요소는 텍스트 얼라인 센터로 맞출 수 있다. 
- img 태그도 인라인요소이다. 따라서 

```css
img{
   text-align : center 
}

p{
    text-align : center;
}
```



### text-align의 아이러니

- text-align은 inline요소에만 '적용'된다. 
- 따라서 p태그에 적용된 text-align은 p태그 자체를 가운데 정렬시키지 못한다. 
- 왜냐하면 p태그는 블럭요소이므로, 너비를 꽉차게 차지하고 있기 때문이다. 
- img태그도 가운데 정렬을 하지 못한다. 왜냐하면, img 태그는 너비 자체가 무의미하기 때문이다. 
- 따라서 text-align은, 블럭요소에 주는, 자식을 가운데로 정렬하는 속성이라고 할 수 있다. 스스로를 정렬하는 것이 아니라, 자식의 배열을 결정하는 요소인 것이다. 

