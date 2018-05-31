# 포지션 관련 프로퍼티

헷갈리는 개념들 정리하기

## offet vs position

- position 은 DOM이 기준이 된고 offset은 문서가 기준이 된다. 

### position

```javascript
var position = $('div').position().left;
```

div가 absolute 이고 부모가 relative 일 경우 부모로 부터 상대적인 left 의 값을 가져온다.



### offset

```javascript
var offset = $('div').offset().left;
```

브라우저로 부터 margin,padding,position 등에 관계없이 div의 절대적위치 left 값을 가져온다.



출처 : <http://naver.me/F4PsTXLm>





- margin-left vs left
- fixed vs absolute
- padding vs margin