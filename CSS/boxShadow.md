# box-shadow

- box-shadow 는 fragment 단계에서만 영향을 준다. 

  즉, 그림만 그릴 뿐 실제 geometry 의 크기가 변하게 만들지는 않는다. 

- border-radius 의 영향을 받는다.





## 한쪽 방향으로만 넣기

```css
box-shadow: 0 5px 5px -5px; #000 // 4번째 값은 그림자의 크기임.
```



## 두겹으로 넣기

- 아래에서 위로 쌓인다.



## border-box

- Fragment 단계에서 작동되는 기능
- geometry 단계에서는 작동하지 않는다.