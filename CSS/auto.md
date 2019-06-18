## auto 

### margin : 0, auto

```css
div{
    margin: 0 auto
}
```

- 0 auto는 무엇을 의미하는가? 
- 0은 상하를, auto는 좌우를 의미한다. 
- 즉 이 코드는 아래와 동일하다. 

```css
div{
    margin-top : 0;
    margin-right : auto;
    margin-bottom : 0;
    margin-left : auto;
}
```



### auto는 무엇인가? 

- auto는 남는 값을 자동으로 다 돌려준다. 
- 즉, margin-left: auto 라고 하면 왼쪽마진에 에 나머지를 몽땅 준다. 
- 만약 좌우 양쪽에 auto를 하면 동일하게 auto를 나눠갖게 되는데, 이때 생기는 마법이 바로 가운데 정렬이다. 



### 의문점 - 그럼 위아래도 작동하나?

```css
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		article{
			background-color: antiquewhite;
			width: 500px;
			height: 500px;
		}
		div{
			background-color: azure;
			width: 300px;
			height: 300px;
			margin-left: auto;
			margin-right: auto;
			margin-top: auto;
			margin-bottom: auto;
		}
	</style>
</head>
<body>
	<article>		
		<div>가운데 들어갈 놈</div>
	</article>
</body>
</html>
```

실행시켜보면 알겠지만, auto 는 맥락에 따라 달라진다. 

즉, 블럭태그에 auto를 주면 margin-top 은 0이 된다. 

```css
div{
 	margin-top : auto // 0   
}
```

