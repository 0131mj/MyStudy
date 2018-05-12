# 리액트 네이티브

- 리액트 네이티브는 HTML,CSS 앱을 만드는 아파치 코르도바, 아이오닉과 달리 실제 네이티브 앱을 만듬.

- 최종 컴파일시 Objective-C(iOS)와 Java(Android)로 만들어짐 

- JSX문법으로 파일을 작성하면 js-objective-c, js-java로 연결됨.

- 리액트 외에 리액트 네이티브도 함께 임포트 하여 사용한다. 

  

```react
import React from 'react';
import { Text, View, StyleSheet, Image, Button, Alert } from 'react-native';
```



## FlexStyle

- CSS의 display:flex 속성을 스타일형태로 사용 가능하다. 

```jsx
container:{
    flex:1,
    backgroundColor:'#fff',
    flexDirecion : 'row'
}
```



## Expo

- 리액트 네이티브 앱을 만들어주기 위한 도구 
- 안드로이드 스튜디오나 xcode 설치 없이 네이티브 앱 개발이 가능하다
- snack.expo.io에서는 codepen 처럼, 엑스포의 환경을 미리 구성해두어 미리보기 및 구성이 가능하다. 

