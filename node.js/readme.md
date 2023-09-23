# Node js

### 

### 리눅스(우분투)에 설치하기

우분투 버전에서 설치하려면 아래 레포지토리에 가서 설명된 걸 잘 따르면 된다. 

[GitHub - nodesource/distributions: NodeSource Node.js Binary Distributions](https://github.com/nodesource/distributions#debian-and-ubuntu-based-distributions)



여기 주소가 잘 생각나지 않는다면 이런 경로로 찾아가자. 

1. Node.js 홈페이지 방문

2. 다운로드 탭 클릭
   
   1. 다운로드 할 옵션이 여러 개 나오는데 '그 밖의 플랫폼'에서 '패키지 관리자를 통한 Node.js 설치'  이걸 선택한다. 
   
   2. 여기보면 데비안과 우분투 기반 리눅스 배포판 뭐 이런게 나오는데 그걸 클릭해보자.  위에서 붙여넣은 주소로 연결된다.



저 url 안에 있는 내용을  고대로 따라 적은 것이 아래와 같다. 하지만 날짜에 따라 내용이 달라질 수 있으므로, 차근차근 홈페이지를 방문해서 살표보는 것이 낫다. 

#### [**Node.js**](https://github.com/nodesource/distributions#nodejs)

> *루트 액세스 권한이 있는 경우 이미 전체 관리 권한이 있으므로 'sudo' 명령을 생략할 수 있습니다.*

1. Nodesource GPG 키 다운로드 및 가져오기

```shell
sudo apt-get updatesudo apt-get install -y ca-certificates curl gnupgsudo mkdir -p /etc/apt/keyringscurl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | sudo gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
```

2. Deb 저장소 생성

```shell
NODE_MAJOR=20
echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | sudo tee /etc/apt/sources.list.d/nodesource.list
```

> ***선택사항*** :`NODE_MAJOR`필요한 버전에 따라 변경될 수 있습니다.
> 
> ```shell
> NODE_MAJOR=16NODE_MAJOR=18NODE_MAJOR=20
> ```

3. 업데이트 실행 및 설치

```shell
sudo apt-get updatesudo apt-get install nodejs -y
```


