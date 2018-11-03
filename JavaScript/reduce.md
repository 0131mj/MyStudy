# Array.prototype.reduce()

reduce는 흔히 값을 누적하여 토탈 값을 구해낼 때 쓰인다. 

하지만 reduce는 array가 사용할 수 있는 함수 중에서도 가장 매우 강력하다고 소문이 나있는데,  설정값도 많고 복잡해보여 잘쓰이지 않는다. 

차근차근 잘 살펴보도록하다. 



일단 아주 기초적인 문법으로 Essentila하게 필요한 요소만 기술하면 다음과 같다. 

```javascript
const arr = [1, 2, 3];
arr.reduce(reducer);
```

