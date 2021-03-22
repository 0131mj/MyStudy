# Async



#### 프로미스와 콜백

```javascript
function add10(a, callback) {
    setTimeout(() => callback(a + 10), 100);
}

function add20(a) {
    return new Promise(resolve => setTimeout(() => resolve(a + 20), 100))
}

const a = add10(5, log);
const b = add20(5).then(log);

log(a); // undefined
log(b); // Promise{<pending>}
```



일단, 콜백에 콜백은 쓰기가 지저분하고 프라미스는 점만 찍으면 되니까 깔끔하다. 

Promise 의 가장 큰 장점은 then으로 콜백지옥을 해결하는 것이 아니라,  값으로 취급된다는 것에 있다. 



콜백으로 해놓으면 무슨짓을 저지르고 있는지 돌아오기 전에는 알 수 없다.

하지만 프로미스는 상태를 곧바로 돌려준다. 



비동기 상황이 코드로 끝나버리는 것이 아니라, 값으로 다룰 수 있게 된다는 점,

값이므로 일급이고, 함수에 전달되거나 할당되거나 하는 행위를 할 수 있는 점,

바로 이 점이 프로미스의 장점이라고 할 수 있다. 



