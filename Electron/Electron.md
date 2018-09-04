# electron 



## 간단하게 프로젝트 실행해보기 

```bash
git clone https://github.com/electron/electron-quick-start 
```



## 리액트와 섞어서 만들어 보기 

리액트를 만들어서 일렉트론으로 바꾸는 것이 아니라, 일렉트론 프로젝트를 먼저 생성한 다음에 리액트를 추가로 설치한다. 



## 일렉트론의 구조

- 메인 프로세스
  - 렌더러 프로세스
  - 렌더러 프로세스



## 빌드하기

빌드 도구 

- 수동 : ASAR : 파일을 묶어줌
- 자동 : electron-builder 



## 소스코드 보호하기

### zeit/pkg

- v8 내부 컴파일러를 이용해 JavaScript 코드를 바이너리 스냅샷으로 변환해줌
- 소스코드가 노출되지 않음



## Auto Update

- 내장 autoUpdater는 업데이트 체크만 해도 다운로드가 자동으로 개시되고 여러 모로 불편하다. 
- electron-updater를 사용한다.