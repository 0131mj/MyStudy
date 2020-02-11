# Polymorphism

```javascript
const Worker = class {
    run() {
        console.log("working");
    }
    print() {
        this.run();
    }
}

const HardWorker = class extends Worker {
    run() {
        console.log("hard working");
    }
}

const worker = new HardWorker();
console.log(worker instanceof Worker); // true (substitution)
worker.print(); // hard working (internal identity)
```



#### 대체 가능성(substitution)

- 확장된 객체는 원본으로 대체 가능



#### 내적 일관성 (internal identity)

- 어떠한 경우에도 태어났을 때의 원본클래스를 유지하려는 속성



#### Polymorphism : 대체 가능성(substitution) + 내적 일관성 (internal identity)

- (Bjarne Stroustrup 이 제안하고 여러 학자들의 동의를 거쳐) 프로그래밍 사이언스에서 객체지향 언어의 특징을 이렇게 규정함 