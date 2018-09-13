 # Linear Gradient
 
 ## 활용법 : 배경만 투명하게 만들기
 
- 보통 배경을 반투명으로 만들려고 하는 경우, 배경이 상위엘리먼트로서 하위 엘리먼트를 포함하고 있기 때문에 하위 엘리먼트의 색상까지 투명도가 적용된다. 

```html
  <div> <!-- 여기만 투명하게 하고 싶었으나, -->
    <section></section> <!-- 여기까지 투명해짐 -->
  </div>
```
- 이때, 배경만 투명하게 만들고 싶은 경우, linear-gradient 속성을 사용할 수 있다. 
 
 ```css
     background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), 
     url(https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5MC8xMzQvb3JpZ2luYWwvcmFiYml0LmpwZw==);
 ```
