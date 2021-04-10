# Error

프로그램은 여러 이유로 실패한다.

에러가 났을 때, 제대로 처리 하지 않으면 에러가 있다는 것 조차 모르고 지나간다. 



컴파일 에러가 나거나 프로그램이 죽거나 에러를 뿜어내면 다행인데, 

컨텍스트 에러가 있어서 프로그램 스스로가 결함을 껴안고 문제를 숨겨버리면 에러를 찾기 힘들다. 



##### 나쁜 예시

```javascript
const double = (a) => {
    if(typeof a !== "number"){
        a = 0;
    }
    return a * 2;
}
```

위의 코드는 에러에 대한 내결함성을 갖고 있다. 



##### 올바른 해결

```javascript
const double = (a) => {
    if(typeof a !== "number"){
		throw `invalid value ${a}`;
    }
    return a * 2;
}

try {
  double(null);
} catch(e){
  console.error(e);
}
```





### 에러처리 사례

```javascript
const validCheck = {
    err(msg) {
        throw new Error(msg);
    },
    isNotEmptyArray(arr) {
        if (!Array.isArray(arr)) this.err(`${arr} is not array`);
        if (arr.length === 0) this.err(`arr is empty`);
    }
};

const recF = (arr) => {
    validCheck.isNotEmptyArray(arr);
    const sum = (arr, i, acc) =>
        typeof arr[i] !== "number"
            ? validCheck.err(`invalid value(index: ${i}): ${arr[i]}`)
            : (i > 0 ? sum(arr, i - 1, arr[i] + acc) : acc);
    return sum(arr, arr.length - 1, arr[0]);
};

try {
    console.log("result: ", recF([2, null]));
} catch (e) {
    console.error(e);
}

```









## CORS

- Access to fetch at 'http://localhost:4000/' from origin 'http://localhost:3000' has been blocked by CORS policy: Response to preflight request doesn't pass access control check: No 'Access-Control-Allow-Origin' header is present on the requested resource. If an opaque response serves your needs, set the request's mode to 'no-cors' to fetch the resource with CORS disabled.
- 프리 플라이트 요청에 대한 응답으로 액세스 제어 검사를 통과하지 못했습니다. 'Access-Control-policy': 'http : // localhost : 3000'에서 'http : // localhost : 4000 /'에서 가져 오는 액세스가 CORS 정책에 의해 차단되었습니다. Allow-Origin '헤더가 요청 된 리소스에 있습니다. 불투명 한 응답이 사용자의 요구를 충족 시키면 요청 모드를 'no-cors'로 설정하여 CORS가 비활성화 된 상태에서 자원을 페치하십시오.



## instanceof

- Right-hand side of 'instanceof' is not an object, 
- 오른쪽편에 있는 것이 객체가 아니다.

