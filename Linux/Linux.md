# 리눅스 기본 명령어 정리

열려있는 포트 확인하기

```shell
sudo ss -lntu
```

**[ 인코딩 명령어 ]**

```
export LANG=ko_KR.eucKR 
```

#### [ 파일 검색 ]

```
grep -e 'keyword' / -R
grep -e 'keyword' ./ -R
```

#### [ 깃 생성하기 ]

1.깃폴더로 경로 이동    

```
cd /home/git
```

2.깃 생성        

```
git init --bare gosimart_renewal.git 
```

3.권한부여        

```
chown git.git gosimart_renewal.git -R 
```

4.내 컴퓨터에서 깃 가져오기 실행 

5.커밋

#### [ 히스토리 검색 ]

```
history | grep cd 
```

(cd 가 들어간 모든 명령 히스토리 검색)

#### [파일 전송]

업로드 : 

```
rz 파일명
```

다운로드 : 

```
sz 파일명
```

#### [vi 편집기에서 줄번호로 이동]

```
숫자입력후 shift+G
```

#### [한 쪽에만 있는 파일 찾기]

```
diff -qs <dir1> <dir2> | grep Only
```

#### [ 파일 권한 ]

```shell
chmod 400 filename.txt
```

## apt

### 정의

apt란, Advanced Packaging Tool 로, 패키지들을 관리하는 툴이다. 

### apt vs apt-get

apt-get은 apt 의 확장판, 

## step 2. CURL

curl은 사용자 상호 작용 없이 작동하도록 설계된 서버에서 또는 서버로 데이터를 전송하기 위한 명령줄 유틸리티입니다. 

curl을 사용하면 HTTP, HTTPS, SCP , SFTP 및 FTP 등 지원되는 프로토콜 중 하나를 사용하여 데이터를 다운로드하거나 업로드할 수 있습니다. curl은 전송을 재개하고 대역폭을 제한하며 프록시 지원, 사용자 인증 등을 수행할 수 있는 다양한 옵션을 제공합니다.

대부분의 리눅스 배포판에는 CURL이 기본적으로 깔려 있다. 

CURL이 제대로 깔려있는지 확인하는 방법은 터미널에서 다음 명령을 입력하는 것이다.

```shell
curl
```

CURL이 깔려있지 않다면, 다음 명령어를 수행하여 CURL을 설치한다.

```shell
sudo apt install curl
```

### 

## Step 3. PPA (Personal Package Archive)

리눅스는 업데이트를 각 프로그램이 직접 하는 것이 아닌 패키지 저장소를 이용하여 업데이트를 해야한다.

하지만 우분투 공식 패키지 저장소에서는 유명한 프로그램이 아닌 일반 프로그램의 최신 버전이 담겨있지 않기에 우리는 이러한 **업데이트/설치를 PPA에서** 할 수 있게 된 것이다.

즉, 개인 패키지 저장소란 뜻을 가진 PPA는 런치패드에서 제공하는 우분투의 공식 패키지 저장소에 없는 서드 파티 소프트웨어를 위한 **개인용 소프트웨어 패키지 저장소**이다.

## Step 4. ssh

ssh 가돌아가는 중인지 확인하기 : 아래 명령어를 수행하여, [+] ssh가 나오면,ssh가돌아가고 있는 것이다.

```shell
servive --status-all
```
