# this

this가 어려운 이유는, 쓰임새에 따라 가리키는 대상이 달라지기 때문이다. 

> this는 작성시점이 아닌, 런타임 시점에 바인딩 되며, 함수 소출 상황에 따라 컨텍스트가 결정된다. - You Don't Know JS



## this 바인딩 case by case

일단 결론부터 말하자면 다음과 같다. (급하면 이해하기 전에 암기부터 하자.)

- 객체의 메서드를 호출할 때 : this는 해당 메서드를 호출한 객체로 바인딩 된다. 
- 함수를 호출할 때 : 전역 객체에 바인딩
- 생성자 함수를 호출할 때 : 새롭게 생성되는 빈 객체에 바인딩 
- call과 apply 사용시 : 지정해준대로 바인딩 


