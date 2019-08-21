# for 문

```javascript
for (ex1; ex2; ex3) {
    
}
```

- ex1 : 선언문, 공문, 혹은 식(표현식) 이 들어올 수 있다. 
- ex2 : 식만 올 수 있다.  truthy
- ex3 : for 문의 끝에서 한번 실행, 아래와 같이 표현할 수도 있다.

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



# for ( in )



# for ( of )

```javascript
for(const v of iter){
    console.log(v)
}
```

- ES6 에서 추가로 도입된 구문
- iterator 를 소비한다. 
- iter 자리에는 문자와 배열이 올 수 있다. 



