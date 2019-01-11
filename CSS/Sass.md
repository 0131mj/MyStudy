# Sass

## 속성 nesting

```scss
h1{
    font:{
        size: 12px;
        weight: bold
    }
}
```

- 셀렉터 뿐만아니라 속성에도 nesting을 적용할 수 있다. 



## mixin

- 선택자와 속성을 재활용 할 수 있도록 해주는 문법
- @mixin으로 선언하고, @include로 호출한다. 
- 인자를 삽입할 수 있으며, 인자를 활용할 때 mixin의 사용효과가 극대화 된다. 



## 내장함수

```scss
background-color{
    lighten($color, 20%)
}
```



## interpolation

```scss
$side:top;
.div{
    border-#{side}-radius:10px
}
```

'#{}'를 사용해서 변수의 속성과 선택자의 이름을 동적으로 치환 가능하다. 

## 상위 클래스 호출

```scss
.inner{
    .outer & {
    
    }
}
```

&를 이런식으로 상위 클래스를 역으로 붙여 사용 가능하다.
https://css-tricks.com/using-sass-control-scope-bem-naming/#article-header-id-1
