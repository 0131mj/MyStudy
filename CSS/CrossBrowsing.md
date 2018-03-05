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
