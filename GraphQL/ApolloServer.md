# ApolloServer

```javascript
const server = new ApolloServer({ typeDefs, resolvers});
server.listen().then(({url})=>{
    console.log(`server ready at ${url}`)
})
```

ApolloServer는 typeDefs와 resolvers라는 두개의 인자를 받아서 만든다.

- typeDefs:  GrapqhQl 명세에서 사용될 데이터, 요청의 타입을 지정, gql(template literal tag)로 생성됨
- resolvers: 서비스의 액션들을 함수로 지정, 요청에 따라 데이터를 반환, 입력, 수정, 삭제



#### GraphQL Playground

- 작성한 GraphQL type, resolver 명세 확인
- 데이터 요청 및 전송 테스트



### typeDefs

```javascript
const typeDefs = gql`
	type Query {
		teams: [Team] 
	}
	type Team {
		id: Int
		...
	}
	type Mutation {
		deleteEquipment(id:String): Equipment
	}
`
```

- 쿼리 및  Mutation의 root type과 반환할 타입이 지정되어 있다.
- 위에서 [Team] 은 대괄호, 즉 배열을 의미한다. 



### resolvers

```javascript
const resolvers = {
    Query: {
        teams: () => database.teams,
        team: (parent, args, context, info) => database.teams
        	.filter((team)=>{
            	return team.id === args.id
        	})[0],
    },
    Mutations: {
        
    }
}
```

- 실제 함수가 기술되는 영역
- 위에서처럼 team이라는 쿼리를 만들어줬다면, typeDefs에도 아래와 같이 team을 추가해줘야 한다.

```javascript
const typeDefs = gql`
	type Query {
		teams: [Team]
		team(id:Int): Team
	}
`
```



#### 서브쿼리 추가하기

- 쿼리의 이름내에서 서브쿼리처럼 값을 가져오게 할 수도 있다. 
- 먼저reaolvers의 Query의 teams에서 단순하게 teams를 반환하는게 아니라, map으로 부가적인 정보를 실어서 보내도록 하고,
- typeDefs에서 Team에 부가적인 필드를 지정해주면 된다.





### 타입



#### 스칼라 타입

GraphQL 내장 자료형

- ID
- String
- Int
- Float
- Boolean



#### 열거형

- enum

```javascript
const typeDefs = gql`
	enum Role {
		developer
		designer
		planner
	}
`
```



#### union

```javascript
const typeDefs = `gql
	union Given = Equipment | Supply
`
```



#### interface



#### input