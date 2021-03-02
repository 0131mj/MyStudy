# fileSystem

```javascript
const fs = require('fs');
```



#### readFile

- 파일은 기본적으로 비동기로 읽힌다. 
- 추가적으로 수행하고 싶은 코드는 콜백으로 처리한다.

```javascript
readFile('test.txt', 'utf8', (err, result)=>{
   console.log(result); 
});
```





#### readFileSync 

- 파일을 동기식으로 읽게 처리한다. 
- 콜백을 사용하는 대신, 값을 바로 리턴 받도록 한다. 
- 하지만 거의 사용되는 일은 없는데, 이 방식은 블로킹이기 때문이다.

```javascript
const result = readFileSync('test.txt', 'utf8');
console.log(result);
```





#### readdir

- 디렉토리 이름을 읽어서 배열로 리턴해주는 함수





#### writeFile

- 파일 쓰기

```javascript
fs.writeFile('data/filename', 'content', 'utf8', (err) => {
    res.writeHead(200);
    res.end('success');
})
```







## 버퍼

- 파일을 조각조각으로 보내는 단위



## 스트림

- 버퍼들의 흐름

```javascript
const fs = require('fs');
const readStream = fs.createReadStream('file.txt');
const writeStream = fs.createWriterStream('file2.txt');
```



