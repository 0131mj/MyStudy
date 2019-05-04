# SVG



## svg 파일을 저장하는 방법

1. 파일로 저장하기
2. HTML에 embed 시키기



## HTML 파일 안에서 svg 사용하기

```html
<svg width="100" height="100">
</svg>
```

- svg 라는 태그를 정의하면서 사용할 수 있다. 
- 안에 들어가있는 속성인 width와 height가 svg의 크기를 결정한다. 



## 사용 속성들

### elements

- circle

### property - 형태 관련

- cx : center x
- cy : center y
- r : 원의 반지름
- rx : 가로 반지름 (타원에서 사용)
- ry : 세로 반지름 (타원에서 사용)
- x1 : 라인의 시작 x 좌표 (직선에서 사용)
- y1 : 라인의 시작 y 좌표 (직선에서 사용)
- x2 : 라인의 끝 x 좌표 (직선에서 사용)
- y2 : 라인의 끝 y 좌표 (직선에서 사용)



### property - 스타일 관련

- stroke : 테두리의 색상
- stroke-width: 테두리의 두께
- fill : 안에 들어있는 도형의 색상
- fill-rule : 채우기 규칙



### CSS

- property 속성으로 추가할 수 있다. 