#  npm



## npm init

- package.json 을 생성해주는 명령어



## npm install -g

- g는 글로벌하게 설치한다는 뜻임
- global 보다는, 환경변수에 등록되었기 때문에 전역으로 실행할수 있는 "명령어" 가 되었다는 것이 더 큰 의미를 가진다.



## npx

- node package execute
- npm 으로 이미 프로젝트에 설치한 모듈을, npm install -g 를 사용해서 또 설치하는 것은 중복이기 때문에, npx 라는 키워드를 붙이면 글로벌처럼 실행을 해준다. 
- npm install -g 로 설치한 것과, npm으로 설치한 모듈의 버전이 달라질 수 있는데, npx는 프로젝트 자체에 설치된 버전으로 실행해준다.



## package-lock.json

- ^3.4.5 이런 버전은 정확하지가 않다. (4미만)
- 이 버전을 정확하게 적어놓은 파일이 package-lock.json 이다. (캐럿이 빠짐)





# yarn

- yarn 과 npm 은 섞어서 쓰지말고 둘중 하나만 쓸 것.