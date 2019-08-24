# null vs undefined

- undefined의 타입은 undefined 이고, 값도 undefined 이다. 
- null 의 타입은 object 이다. 
- null 의 타입이 object 라는 버그 때문에, null은 타입이 아니라 값으로 비교를 해야 한다. 



사람이 의도적으로 값을 비워두는 경우 null을 사용하고,
컴퓨터가 값을 설정하지 않았을때  undefined로 나오게 하면 구분하기가 수월하다.