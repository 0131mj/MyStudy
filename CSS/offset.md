# offset

- Geometry가 계산값에 의해 도출된, 최종적인 숫자의 결과 측정치
- 읽기 전용속성 (참고는 가능하지만 변경은 불가능하다. )



## 속성

- offsetLeft
- offsetTop
- offsetWidth 
- offsetHeight



- offsetScrollLeft

- offsetScrollTop
- offsetScrollWidth
- offsetScrollHeight



내가 확보한 geometry의 크기는 width, height로 표현된다.

위쪽에 있는 결과는 눈에 보이는 결과값이며, 아래쪽에 Scroll이 붙어있는것이 진짜 컨텐츠의 크기이다. 

(참고로 scroll 을 제어할 때는 offsetScroll 이 아니라, scrollTo 를 사용한다.)



## frame

- 복잡하고 많은 요소들로 이루어져있는데 이를 한번에 계산하기는 어렵다. 
- 이를 묶음처리하는 렌더링의 최소 단위를 frame이라고 부른다. 
- 변경된 geometry는 한 프레임 단위로 묶여져서 적용이 되고, 끝나면 flush 처리가 된다.



### frame 과 offset의 관계

- offset을 요청하면 현재 frame이 그려지고 있든 말든, 현재의 인스턴스한 결과를 즉시 사용자에게 리턴해준다. 
- 즉 offset 은 frame 단위로 묶어서 렌더링하는 원칙에 위배되며, 많은 부하를 유발시킬 수 있다.
- 따라서 움직이고 있는 개체보다는 렌더링과 계산이 모두 끝난 개체에 적용하는 것이 바람직하다. 



##  offset Parent : 기준점

- offset 을 계산하는 가장 기본적인 로직은, 부모의 기준점으로부터 상대적인 위치를 찾는 것이다. 
- 이 기준이 되는 지점, 대상을 offset parent 라고 부른다. 
- DOM 상의 Parent와는 완전히 다르게 작동한다. 



offset parent 를  찾는 방법은 아래의 원칙에 따른다. 



### 1. Null

다음 케이스에서는 offset parent가 존재하지 않는다. 

- root, html, body
- position: fixed
- out of DOM tree



### 2. Recursive Search

offset parent 는 아래의 룰에 따라 재귀적으로 상위의 DOM을 찾아가는 탐색을 수행한다.

- Parent.position === fixed  => null 
  : 바로 static parent 가 없는 것으로 처리된다. 
- Parent.position !== static =>  continue
  : static이 아니어야 한다는 룰을 적용하자면,  fixed 도 null 로 처리되므로 position 값이 absolute 이거나 relative이어야만 offset parent 로서의 자격이 부여된다. 
- body => continue
- td, th, table => continue





## position vs offset

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

