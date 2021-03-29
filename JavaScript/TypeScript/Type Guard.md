# Type Guard

런타임에 사용하는 연산자 instanceof , typeof, in 등과 함께 어우러져 쓰면, 컴파일타임에 인식을 한다.

특정 타입으로 타입의 범위를 좁혀서 필터링해나가는 과정

```typescript
function logMsg (value: string | number) {
	if (typeof value !== string || typeof value !== number) {
        throw new TypeError("value must be string of number");
    }
}
```

