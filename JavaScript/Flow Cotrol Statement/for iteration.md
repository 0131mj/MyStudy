# for 문

for에 들어가는 모든 값 ex1, ex2, ex3은 옵션이다.

그런데 이렇게 쓰지마라. 그냥 포문 자체를 쓸일이 사실 거의 없긴 하다. 

```javascript
for (ex1; ex2; ex3) {
    
}
```

- ex1 : 초기값 - 선언문, 공문, 혹은 식(표현식) 이 들어올 수 있다. 
- ex2 : 비교값 - 식만 올 수 있다.  truthy
- ex3 : 증감 - for 문의 끝에서 한번 실행, 아래와 같이 표현할 수도 있다.

```javascript
for (ex1; ex2;) {
    ex3;
}
```



## for 의 예외상황

```javascript
for (; ; ;){
    
}
```

- 위 문장은 무한루프에 빠진다.
- 원래 아무것도 없는 값 [Empty]은 falsy 로 평가된다. 
- 하지만, ex2 에 공문(or 공식)이 올 경우,  truthy 로 평가된다. (ECMA script 에 정의되어 있음)



## for ( in )

객체의 속성을 순회할때 사용하는데, 몇가지 주의해야 할 점(단점) 이 있다. 

- 인덱스가 문자열로 떨어진다.
- 배열요소 뿐만 아니라 확장속성도 순회한다. 
- 루프의 순회순서가 무작위다. 즉 실행순서가 보장되지 않는다. 





## for ( of )

배열의 원소를 순회하기 위해 사용하는 구문

```javascript
for(const v of iter){
    console.log(v)
}
```

- ES6 에서 추가로 도입됨.
- iterator 를 소비한다. (따라서 문법은 간단하지만) 비용이 비싸다.
- iter 자리에는 문자와 배열이 올 수 있다. 즉, for of 의 대상이 되는 것은 문자, 배열, Map, Set, 등이다. 그리고...



### for of 의 작동방식

- for of 는 "이터레이터" 라는 특정메소드를 반복호출 하는 방식으로 이뤄진다. 
- Array, Map, Set 얘네들도 모두 iterator 메소드를 갖고 있다. 
- [Symbol.iterator]를 키로 가진 메소드를 객체에 넣어주면, 어떤 객체든 사용이 가능하다. 
- 이런 [Symbol.iterator] 메소드를 가진 객체를 "이터러블" 객체 라고 부른다.  
- 즉, 이터레이터를 갖고 있으면 이터러블 객체이다. 



## for  vs  while

#### for

- iteration

- 상황이 확정적일 때 사용한다. (1부터 10까지 더하기...)



#### while

- recursive 
- 상황이 불확실할 때 사용한다.







## for문을 바라보는 관점

for문은 루프의 컨텍스트를 공유한 일반 함수호출과 같다. 

재귀호출이 계속해서 변수를 집어넣어서 호출을 하는 반면,  스코프를 공유변수를 변경해서 계속 함수를 호출하는 것으로 이를 대신하는 것이다.

재귀는 인자에만 의존하기 때문에 공유변수같은건 없다.

```javascript
const f = (arr) => {
    for(let i = 0; i <arr.length; i++){
        console.log(arr[i]);
    }
}
```



```javascript
const f = (arr) => {
    let i = 0;
    const innerF = () => {
      console.log(arr[i]);
    };
    for (i; i < arr.length; i++) innerF();
  };
```

