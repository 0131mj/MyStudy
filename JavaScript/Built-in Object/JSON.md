# JSON Object



#### JSON.stringify()

문자열로 그대로 바꿔주는 것은 아니다. 

undefined, Infinity, NaN, null은 null로 변환된다. 

```javascript
const arr = [null, undefined, NaN, , "", Infinity];
arr.length = 10;
console.log(JSON.stringify(arr)); // [null,null,null,null,"",null,null,null,null,null]
```

- 2번째 파라미터 : replacer
- 3번째 파라미터 : 구분자