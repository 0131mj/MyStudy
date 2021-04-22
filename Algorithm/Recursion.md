# Recursion : 재귀



#### 구조

모든 재귀문은 언제 멈출지를 알려줘야 한다. 

재귀문은 아래와 같이 두 부분으로 나뉜다. 

- base case : 기본 단계
- recursive case : 재귀 단계



#### Stack

재귀는 stack을 사용한다. 



#### 재귀의 단점

- 호출할 때마다 모든 정보를 저장해야 하므로 메모리를 많이 소비한다. 



#### 재귀의 단점을 보완하는 두 가지 방법

1. 재귀 대신 반복문을 사용한다.
2. 꼬리 재귀를 사용한다.



##### 예제 1 : 카운트 다운

```python
def countdown(i):
    print(i)
    if i <= 1:
        return
    else:
        countdown(i-1)

countdown(10)
```





##### 예제 2 : factorial

```python
def fact(x):
    if(x == 1):
        return x
    else:
        return x * fact(x-1)

print(fact(3)) 
```

- 3 * fact(2) : 첫번째 평가
- 3 * (2 * fact(1)) : 두번째 평가
- 3 * (2 * (1)) : 마지막 평가

