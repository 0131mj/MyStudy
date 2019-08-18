# while

```javascript
while(truthy){

}
```

- while 문은 간단하지만, 무한 루프에 빠지기 쉬운 악마같은 존재이다. 
- 가장 우선적으로 판단해야 할 것은 탈출조건이 body 에 들어있느냐를 확인 하는 것이다. 
- 즉, 괄호안의 상태를 바꾸어주는 조건이 body 안에 존재하는가를 먼저 살펴봐야 한다.
- body는 중문으로, 두줄이상이 되는 것이 일반적이다.



```javascript
while (act.method().c) {
    other.action();
}
```



## do while

- 구조 : do - 문 - while - 식

기본형

```javascript
do {
    
}while (truthy)
```





```javascript
do a++; while(a);
```

