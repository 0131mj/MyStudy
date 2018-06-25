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



## translate 홀수 이슈

```css
transform: translate(-50%, -50%);
```

홀수가 되면 텍스트가 흐릿하게 블러처리가 된다. 

- 짝수로 맞추어주면 해결이 된다. 
- 홀수로 꼭 유지를 해야 한다면 translate의 숫자를 51%로 조정한다. 



