# Iterator Interface



## Iterator 

1. next 라는 키를 갖고
2. 값으로 인자를 받지 않고 IteratorResultObject 를 반환하는 함수가 온다. 

```javascript
const iterator = {
    next : () => IteratorResultObject
}
```



## IteratorResultObject

1. value 와 done을 갖고 있다. 
2. done 은 계속 반복할 수 있을지 없을지에 따라 불린값을 반환한다. 

```javascript
{
    value : 1,
    done : true
}
```



```javascript
const iterator = {
    next(){
        return {
            value : 1,
            done : true
        }
    }
}
```

