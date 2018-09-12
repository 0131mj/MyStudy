# line-height



## 단위 사용

- line-height는 픽셀단위가 아니라 상대적 비율로 하는 것이 원칙이다. 
- 주의 : 단위를 빼고 쓴다. 
- (1.5em X , 1.5 O)



## line-height : 1.5 vs line-height: 1.5em

line-height는 상속된다. 

#### line-height  : 1.5 em

- 해당엘리먼트의 폰트사이즈를 기준으로 line-height 사이즈가 정해진다. 예) 20px 
- 이 정해진 20px이 그대로 상속된다. 
- 하위 엘리먼트의 폰트사이즈가 40px이라고 하더라도 line-height는 20px을 그대로 갖는다. 



#### line-height  : 1.5 

- 1.5라는 배율이 그대로 상속된다 
- 하위 엘리먼트는 해당 엘리먼트의 폰트사이즈의 1.5배에 해당하는 line-height를 갖는다. 



## em을 써야 하는 경우

- 네거티브 마진을 줘서 위치를 이동해야 할 경우, 마진을 1em등으로 동일하게 준다.
- 그러면 폰트사이즈가 달라지더라도  line-height를 동일한 비율로 유지할 수 있다. 
- 그러면 폰트사이즈가 달라지더라도  line-height를 동일한 비율로 유지할 수 있다. 
- 그러면 폰트사이즈가 달라지더라도  line-height를 동일한 비율로 유지할 수 있다. 



## 리딩영역

- 리딩영역이란, 텍스트가 여러줄이 되었을때 가독성을 높이기 위해 폰트에서 임의로 지정해놓은 위아래 여백을 말한다. 
- font-size: 16px; 은 리딩영역을 제외한 height를 말한다. 
- line-height: font-size + 리딩영역사이즈
- line-height를 지정하지 않으면 line-height:normal이라는 속성이 기본으로 지정되는데 이 값은 폰트마다 다르다. 



## line-height : 1

- 리딩역역을 제외한 텍스트의 높이가 line-height가 된다. 1을 쓰면 영문의 경우 삐져나가는 경우가 잦다. 