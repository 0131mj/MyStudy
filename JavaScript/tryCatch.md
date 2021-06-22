# try catch

### throw

- 에러 발생시, 코드를 진행시키지 않고 던지는 처리방식
- throw의 대상은 값, object 또는 Error 객체 등이될 수 있다. 

```javascript
try {
    throw 표현식;
} catch(err) {
    log(err);
}
```



#### Error 객체

```javascript
function f2(){
    throw new Error("에러");
}
```

throw 를 발생시킬때 Error 객체를 리턴 하면, 콜스택을 함께 리턴한다.