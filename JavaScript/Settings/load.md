# load

자바스크립트 파일을 로드하는 과정



defer 속성을 추가하면, 자바스크립트 파일을 백그라운드에서 다운로드 받을 수 있다. 

body태그가 끝나는 지점 바로 위에 놓는 것보다 이 편이 더 매끄럽게 작동한다.

```html
<script defer src="./script.js"></script>
```

