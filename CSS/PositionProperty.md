# Position

어떤 특정 gemetry 속에서 left, top 등을 결정하는 룰을 지정하는 방식(계산식)

- static
- relative
- absolute
- fixed
- inherit



## relative

- static으로 먼저 개체를 그리고, 붕 떠서 다시 지정된 위치에 다시 그려준다.



## static vs relative

- relative 가 위로 올라온다. 
- relative 끼리는 z-index 가 경합을 벌인다. 





## 포지션 관련 프로퍼티





JavaScript 



## offset

- 읽기 전용속성



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