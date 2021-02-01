# 비구조화 할당

객체나 배열을 해체함

비구조화 할당과 동시에 커스텀 변수명 지정도 가능하다. 

```javascript
const data = {
		name : 'aaa',
		email : 'aaa@aaa.com',
		phone : '010-0000-0000'
	}
	
const {phone:contact} = data;
console.log("contact",contact); // '010-0000-0000'
```



```javascript
const [a, b] = str.split('.')
```

