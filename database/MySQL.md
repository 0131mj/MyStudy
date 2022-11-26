# MySQL



## 서버켜기 / 접속 /  접속종료 / 서버 끄기 (xampp, Windows 터미널 기준)



### Step 1. 서버 켜기 

맨 먼저 서버를 켜줘야 하는데 bin 폴더에 가면 mysqld.exe 파일이 있는데 이걸 실행해주면된다.

```shell
C:\xampp\mysql\bin> mysqld	
```

서버를 켜는데 성공하면 아래와 같은 메세지가 나타나면서 서버가 실행된다는 것을 알 수 있다. 

```shell
mysqld (mysqld 10.4.24-MariaDB) starting as process 10468 ...
```





### Step 2. 접속하기

접속을 할 때는 mysql 이란 명령어를 사용한다. (루트계정 접속)

```shell
mysql -uroot -p
```

그럼 비밀번호를 입력하라고 한다.

```shell
Enter password:
```

비밀번호를 입력하고, 접속에 성공하면 아래와 같은 메세지가 나올 것이다.

```shell
Welcome to the MariaDB monitor.  Commands end with ; or \g.

Server version: 10.4.24-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]>
```

실패 케이스)
혹시라도 mysql에 접속하려는데 아래와 같은 에러메시지가 뜬다면, 비밀번호가 틀려서가 아니라 아예 MySQL 서버 자체가 실행되지 않는 것이라고 보면 된다. 

```shell
ERROR 2002 (HY000): Can't connect to MySQL server on 'localhost' (10061)
```



### Step 3. 접속 종료

```shell
MariaDB [(none)]> exit
```

명령어 exit를 입력하거나 Ctrl+C를 누르면 된다. 

```mysql
MariaDB [(none)]> Bye
```

그럼 MySQL이 잘가라고 인사를 하면서 cli에서 빠져나오게 된다. 
여기서 유의할 점 : 접속을 종료했다고 해서 서버가 꺼진 것은 아니다. 



### Step 4. 서버 끄기

종료는 시작과 달리, mysqladmin 이라는 걸 사용한다.

```shell
C:\xampp\mysql\bin> mysqladmin -u root -p shutdown
```





## 명령어 모음

### concat 명령어 : 컬럼의 텍스트를 합쳐서 출력

```sql
select replace(concat(maker_name, car_name_detail),' ', '') as fullname
from car_master as cm join maker_master as mm on cm.maker_index=mm.maker_index
order by length(fullname) desc
```
