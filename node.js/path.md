# Path



## path.sep

- 세퍼레이터(구분자) : 윈도우의 경우 백슬래시 두개를 리턴한다. 



## path.delimeter

- 환경변수 구분자 : 윈도우는 세미콜론, 리눅스/맥은 콜론을 리턴한다.



## path.dirname

- 경로명



## path.parse 

- 경로정보 분해



## path.format





## path.normalize

- 알아서 잘못된 패스네임을 제대로된 방식으로 변환해준다.



## path.isAbsolute()

- 절대경로인지를 불린 값으로 리턴하는 함수



## path.relative



## path.join

- 조각난 경로를 하나로 합쳐주는 함수 (절대경로 무시)
- './a', '../' , '../' 이렇게 경로명이 있다면 이 경로명을 순차적으로 찾아주는 함수이다.



## path.resolve

- '/경로명' 을 path.join과 다르게 절대경로로 취급한다. 