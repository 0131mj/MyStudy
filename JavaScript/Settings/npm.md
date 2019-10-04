# npm



### 개발용으로만 설치

```
npm i -D
```

- "-D"를 붙이 면 개발용으로만 깔린다. (package.json에서 devDependencies 에만 반영된다.)



#### package.json 

```javascript
// 실제 서비스시에 사용
dependencies:{
    "react": ...
    "reac-dom": ...
}
    
// 개발시에만 사용    
devDependencies: {
    "webpack": ...
    "webpack-cli": ...
}    
```

- devDependencies 에 포함된 내용은 되지 않는다.
- 웹팩의 경우, 실제 서비스를 할 때는 쓰지 않으므로 이렇게 관리하는 것이 좋다.