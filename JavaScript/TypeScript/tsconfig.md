# tsconfig.json

타입스크립트의 tsc를 제어하는 설정



## 기술방식

```json
{
    "compilerOptions": {
        lib: ["DOM", "ES2015"],
        target: "ES2015"
    }
}
```



## 주요 옵션

### compilerOptions

--allowJs : 자바스크립트 파일도 허용

-- lib  : 지원할 문법을 설정함

-- module : 타겟에 따라 설정

-- noImplicit ~.. :  모두 true로 켜두는 것이 좋음

-- outDir : 다른 경로에 저장할 것을 지정

-- strict : 엄격하게 검사할 범위를 지정 (기본적으로 켜두는 것이 좋음)

-- target : 변환할 코드를 지원(ES3가 기본값)

-- types : 포함할 타입 정의

-- typeRoots



- 이중에서 가장 중요한것은 strict true, 

  (초보자의 경우, 이것만 켜놔도 된다.)



### include 

- 포함할 파일지정

### exclude 

- 제외할 파일지정

### extends

- "../confing.json"



## ts --init

npm init 이 package.json 을 만들어 주는 것처럼

tsconfing.json 을 생성해준다. 

