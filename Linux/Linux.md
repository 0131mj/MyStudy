# 리눅스 기본 명령어 정리

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



#### [아파치 재시작]

http.conf에서

```
service http restart
```



#### [한 쪽에만 있는 파일 찾기]

```
diff -qs <dir1> <dir2> | grep Only
```



#### [ 파일 권한 ]

```shell
chmod 400 filename.txt
```



#### [ 프로그램 설치 ] 



```shell
sudo apt-get install apache2
```



#### [ 프로그램 업데이트 ]

```shell
sudo apt-get update
```

