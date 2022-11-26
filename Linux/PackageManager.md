# Package Manager

리눅스에 내장된 패키지 매니저는 yum  과 apt 가 있다. 여기서는  apt 명렁어에 대해 알아본다.





###### 프로그램 설치

```shell
sudo apt-get install apache2
```



###### 프로그램 업데이트 

apt를 최신의 상태로 업데이트 한다. 업데이트를 하고나면, 다운받을 수 있는 프로그램들의 목록이 최신상태로 갱신된다. 

```shell
sudo apt-get update
```



###### 프로그램 검색

apt를 통해 설치할 수 있는 프로그램을 검색한다. 

```shell
apt-cache search htop
```