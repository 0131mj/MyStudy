# Align Center

가운데로 정렬하기



## 1. auto 



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



## 2. text-align : center

- 인라인 요소는 텍스트 얼라인 센터로 맞출 수 있다. 
- img 태그도 인라인요소이다. 따라서 

```css
img{
   text-align : center 
}

p{
    text-align : center;
}
```



### text-align의 아이러니

- text-align은 inline요소에만 '적용'된다. 
- 따라서 p태그에 적용된 text-align은 p태그 자체를 가운데 정렬시키지 못한다. 
- 왜냐하면 p태그는 블럭요소이므로, 너비를 꽉차게 차지하고 있기 때문이다. 
- img태그도 가운데 정렬을 하지 못한다. 왜냐하면, img 태그는 너비 자체가 무의미하기 때문이다. 
- 따라서 text-align은, 블럭요소에 주는, 자식을 가운데로 정렬하는 속성이라고 할 수 있다. 스스로를 정렬하는 것이 아니라, 자식의 배열을 결정하는 요소인 것이다. 

