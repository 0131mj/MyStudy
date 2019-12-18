# Graphic Pipeline



## 1. Reflow

- Geometry를 새롭게 그리는 과정을 Reflow 라고 부른다. 
- 화면에 영역을 설정하는 것
- 렌더트리 자체를 결정한다. 



## 2. Repaint  

- Fragment를 새롭게 그리는 과정을 Repaint  라고 부른다. 
- 렌더트리는 그대로 두고 일부만 변경한다. 
  (리플로우가 발생하면 하위 범주인 리페인트는 부차적으로 항상 발생함)
- 주로 백그라운드 컬러를 바꾼다든지, 



## 3. Post Process

- Reflow 와 Repaint 가 끝났는데도, 뷰를 그려내기 이전에 처리단계를 한번 더 주는 것.
- 3D, keyframe animation, blur, filter, posterize 등...



*렌더링 과정에서 1,2번 과정은 CPU가, 3번과정은 GPU가 담당한다.



참고자료

 https://boxfoxs.tistory.com/408 