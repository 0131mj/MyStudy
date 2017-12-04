1. 우선 아파치를 설치한다. 

`sudo apt-get install apache2`

2. php를 설치한다. (php7은 php버전을 입력하지 않는다.)

`sudo apt-get install php`

3. phpinfo();등을 실행해봐도 아직 html처럼 텍스트만 나올것이다. 

   다음과 같이 설치해준다. 

`
Have you installed php5 and mod_php so Apache knows what to do with php files?
If you're on Ubuntu 15.10 or older
sudo apt-get php5 install libapache2-mod-php5 php5-mysql
If you're on Ubuntu 16.04
sudo apt-get install libapache2-mod-php7.0 php7.0-mysql
`



4.이제 phpinfo();가 실행된다. (확인후 바로 지운다.)
