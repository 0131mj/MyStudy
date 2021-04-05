# GraphQL

이 주제에서 참고한 자료들 : 

- 얄팍한 GraphQL & Apollo 강좌



## GraphQL의 장점

- overfetching 문제 해결 : 필요한 데이터만 받아오는 데 유용하다.
- underfetching 문제 해결 : 원하는 데이터를 한번에 받아올 수 있다.(요청횟수 감소)
- 하나의 endPoint로 처리 가능 :  URI에서 POST로 모든 요청 가능 (query, mutation 모두 POST로 처리된다.)



## Query and Mutation

- 쿼리로도 업데이트를  수행할 수 있다. 다만 약속된 규약이므로 Mutation을 따르는 것이 관례이다.



### query

- 데이터값을 받아올 때 사용

- 인자값을 추가할 수 있다.

```
query {
    teams {
    	
	}
}
```



### mutation

- 데이터를 업데이트 할 때 사용



#### 