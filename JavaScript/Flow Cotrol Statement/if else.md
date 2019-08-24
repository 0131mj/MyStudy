# if ... else

if else 문은 특이하게도, 두 가지 실행문이 언제나 붙어서 생긴다.



## If 

조건이 있을때 실행한다. 



## if 를 없애는 방법

- 프로그래밍적으로 if를 줄일 수 있는 방법은 없다. 
- 논리적으로 줄이거나, 복잡도를 낮출 수 있을 뿐이다.



## if문과  if else문의 차이

- if  : optional - 선택적으로 수행이 될 수도 있고 안될 수도 있다.

- if else :  mandatory  - 항상 수행된다. 





## else if ??

else if 문에 대해 쉽게 생각할 수 있는 오해 중의 하나는,  else  if 문이 병행조건으로 여겨진다는 것이다. 

```javascript
if ( condition1 ) {
    
} else if ( condition2 ) {
    
} else {
    
}
```

마치 condition1,  condition2, condition3,  이 병렬된 조건으로 보인다. 

하지만 위의 문장은, 실제로 아래와 같이 구성된 것이다. 

```javascript
if ( condition1 )  
else 
    if ( condition2 ) 
    else 
```



else if 는, else 뒤에 나오는 if를 괄호 없이 묶어준 것에 불과하다.  

따라서 아래의 코드처럼 사용도 가능 하다는 것이다. 



#### else for

```javascript
if( condition1 ){
    
}else for ( condition2 ){
    
}          
```



#### else switch

```javascript
if( condition1 ){
    
}else switch ( condition2 ){
    
}          
```



실제로 자바스크립트 문법에, else if는 존재하지 않는다. 

- switch case 와  else if 는 기능상으로 완전히 다르다. 
- if else 에서는 병행조건을 사용할 수 없지만, 시각적인 착시에 의해 사용이 가능한 것 처럼 보이는 것이다. 
- 따라서, 병행조건은 무조건 switch 문을 사용해야 한다. 



#### 결론 :  else if 는 쓰지 마라

- 굳이 써야한다면,  else { if ... else  } 로 블록을 묶어라. 
- else 는 후방 결합을 한다.



## 올바른 Flow control 설계하기

- mandatory 를 탔으면, mandatory 로직을 끝까지 타고 가도록 한다. 
- optional로 시작했으면 



구문의 성격상으로 보면,

- if : optional
- if else : mandatory
- switch case : 병행조건 (반드사 default 를 기술하여 mandatory 化 시켜준다.)