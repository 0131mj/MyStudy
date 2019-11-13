# try catch

## Error 객체

```javascript
function f2(){
    throw new Error("에러");
}
```

throw 를 발생시킬때 Error 객체를 리턴 하면, 콜스택을 함께 리턴한다.