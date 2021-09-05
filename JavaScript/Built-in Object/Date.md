# Date



### new Date()

현재 시간을 반환



### Date.now()

현재시간을 밀리세컨드로 반환

new Date().valueOf() 또는 new Date().getTime() 와 같다. 

하지만 굳이 인스턴스를 하나 더 만들 필요가  없는 내장 함수인것이다.



### Date.parse()

문자열을 밀리초로 변환

```javascript
console.log(Date.parse('2019-10-10'))
```

