# Flow Control Statement : 제어문



제어문의 종류와 사용법

- if: optional / shield
- if else : 병렬조건 binary mandatory, 3항식
- switch : 병렬조건 multiple mandatory
- whie: recursive - 사전에 계획되지 않은 반복 (반복할 때마다 다음 반복을 계산한다.)
- for : iteration - 사전에 계획된 반복



### if

단일 if 문은 아래와 같은 케이스에서 사용한다. 다른 경우에 쓰일 수 없다.

- optional : 생길 수도 있는 일
- shield : return 혹은 throw 로 예상되는 일을 미리 차단해버릴 때 사용 (값을 검증하고 아래로 보낸다.)



### if else : 

이지선다형 혹은 모순조건, 둘 중 무조건 하나는 발생한다.

- binary mandatory



#### if와 if else 의 차이점

로직으로 병렬조건, mandatory를 구현하고 있다면 반드시 if else를 써야 한다. 



3항식이 반드시 필요할 때 : return 문의 중복을 제거해야하는 경우



### switch 

스위치는 빈틈없는 mandatory로 짜야 한다. (default가 필요한 이유)

- multiple mandatory



## 제어문 가드 사용법

복잡한 제어문이 mandatory를 거치지 않은 케이스를 확인하기 위해 사용하는 방법

```javascript
const EMPTY = {};
let result = EMPTY;
if(...){
   
}else{
    
}

if(result === EMPTY) throw "no processed";
```

