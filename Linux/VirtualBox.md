# Virtual Box

아파치 접속하기

###### 주소 확인

```shell
ip addr
```

사용하는 VirtualBox 에서 네트워크 > 고급 > 포트포워딩 설정을 해주면 된다.

https://wickedmagica.tistory.com/83

## NAT vs  Bridged

가상머신을 인터넷에 연결하는 방식은 2가지가 있다.

### 방범 1. Bridged

직접 물리적으로 라우터에 연결하는 방식

Host PC 네트워크 대역이랑 같은 네트워크 대역을 사용하는 가상 네트워크 장치

### 방법 2. Host Only

호스트 컴퓨터와만 연결되며, 외부 인터넷과는 연결이 되지 않는 형태

#### 방법 3. NAT

하나의 공인 IP를 여러 장비가 활용할 수 있도록 해준다. 

내 컴퓨터가 공유기가 되어 그 안에서 네트워크 영역을 만들어놓고 내 컴퓨터 안에서 만들어진 네트워트 안에 가상머신을 놓아 운영

포트 포워딩 필요.

## VM ware

고유의 번호가 있다. 

VMnet0 : Bridged

vmnet1 : Host Only Network

VMNet8 : NAT

VM ware 는 17버전이 (2022.11.23 기준) 최신 버전이지만, vmnetconfig가 없어서 15버전으로 재설치 한다. 

https://joonyon.tistory.com/entry/VMware-Workstation-15-Player-%EC%84%A4%EC%B9%98-%EB%B0%8F-Network-%EC%84%A4%EC%A0%95

이 글에 따르면, SSH로 접근을 하기 위해서는 vmnetconfig가 있어야 한다고 한다. 

15.5.7 버전이다. 

삭제하기 : 윈도우 프로그램 추가 제거에 들어가보면 변경만 있고 삭제는 없는데, 변경에 들어가면 삭제가 나온다. 