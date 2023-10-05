# Vite

- 웹팩보다 빠른 번들러 : CRA 대신, 이거 쓰자. 

### 리액트 프로젝트 만드는 법

```bash
yarn create vite [프로젝트] --template react-ts
```

### SASS

- 설치 추가로 해줘야 됨

```bash
yarn add sass -D
```

### styled-component

vite 프로젝트에서 스타일드 컴포넌트 사용

1. 스타일드 컴포넌트 설치

2. 읽을때 텍스트를 나오게 하려면 vite.config.ts 에 아래 문구를 추가한다. 

```json
plugins: [
    react({
      babel: {
        plugins: [
          [
            'babel-plugin-styled-components',
            {
              displayName: true,
              fileName: true
            }
          ]
        ]
      }
    })
  ],
```
