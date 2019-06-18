# Align Center Vertical

### 1. transform 활용하기

```css
.container{
    position : relative;
}

.container .content{
    position : absolute;
    top: 50%;
    transform: translate(0 -50%);
}
```



### 2. transform 활용하기 2

```css
.container{
    position : relative;
}

.container .content{
	margin: 50% 0 0; 
    transfrom : translateY(-50%)
}
```



### 3. display table 활용하기

이렇게 지정해주면 .content 안에 들어있는 내용은 가운데로 몰린다. 

```css
.container{
    display:table;
    border-collapse:collapse;
    border-spacing:0;
}
.container .content{
	display: table-cell;
    vertical-align: middle;
}
```

