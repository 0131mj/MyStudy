# Selection Sort : 선택 정렬

```python
def findSmallestIndex(arr):
    smallest = arr[0]
    smallest_index = 0
    for i in range(1, len(arr)):
        if arr[i] < smallest:
            smallest = arr[i]
            smallest_index = i
    return smallest_index

def selectionSort(arr):
    newArr = []
    for i in range(len(arr)):
        smallest_index = findSmallestIndex(arr)
        newArr.append(arr.pop(smallest_index))
    return newArr

print(selectionSort([5, 3, 5, 2, 10]))
```

예제출처 : hello coding algorithm



#### 배열을 정렬하는 방식

- 새로운 빈 배열을 하나 준비
- '기존배열에서 가장 작은 것을 하나씩 뽑아내서, 뽑아낸 원소를 새로운 배열에 삽입' 하는 과정을 배열이 끝날 때 까지 반복함

