# float

## 속성

- left
- right
- none
- inherit



## 특징

### new BFC

```html
<div style="width:500px">
    <div style="heigt:50px; background:red"></div>
    <div style="width:200px; float:left"></div>
</div>
```

- float 가 등장하면 새로운 BlockFormatingContext가 만들어진다.

- float over normal flow



### text, inline guard

- float는 inline 요소의 guard로 작동한다. 즉, floating 영역에 들어가지 못한다. 따라서 inline 요소는  float요소의 뒤에 붙어서 나온다.
  - 하지만 block 요소는  guard가 되지 않는다. (float 뒤에 숨어서 다 그려진다.)

### line box

- floating 요소는, floating 요소가 들어갈수 있는 line box 라는 공간을 만들어낸다. 
- 이 line box는 자신의 내부에 들어있는 floating 요소를 침범하지 않은채 floating 요소를 inline 요소처럼 쌓아간다.

