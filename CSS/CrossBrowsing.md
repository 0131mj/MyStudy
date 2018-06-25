# 익스플로러 기본스타일 제거

## 아랫방향화살표 없애기
```css
select::-ms-expand {
    display: none;
  }
```

## 셀렉트백그라운드컬러 없애기
```css
select:focus::-ms-value {
  background-color: white;
  color:#555;
}
```



# 사파리 기본스타일 제거

## 클릭시 하이라이트 색상제거
```css
* {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
```



translate 홀수 이슈