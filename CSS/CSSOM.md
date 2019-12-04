# CSSOM : CSS Object Model

```html
<style id="s">
    .test{background:#ff0}
</style>
<script>
    const el = document.querySelector("#s");
    const sheet = el.sheet;
    const rules = sheet.cssRules;
    const rule = rules[0];
    console.log(rule.selectorText); // .test
    console.log(rule.style.background); // rgb(255,255,0)
</script>
```

- HTML에서 텍스트형태로 작성해놓은 스타일 시트는 브라우저가 해석과정을 거치고 나면, 브라우저의 메모리에는 객체 형태로 저장이 되어있어서, 위처럼 끄집어내서 가져올 수 있다. 

- Style DOM Element > sheet > cssRules > type 이런 경로로 접근해서 보면 해당 속성을 볼수 있다. 
- 이처럼 HTML 텍스트로 정의된 CSS 코드를 메모리구조로 바꾼 문서를 CSSOM 이라고 한다.



## CSS Rule type

- style rule
- charset rule
- import rule
- media rule
- font face rule
- page rule
- ....



## rule 추가:  insertRule

```javascript
const sheet = el.sheet;
const rules = sheet.cssRules;

sheet.insertRule('.red{background:red}', rules.length)
sheet.insertRule('.blue{background:blue}', rules.length)
```

- CSS 속성을 추가하고 싶으면, insertRule 을 통해 sheet에 직접 추가해야한다. (rules 에 추가하는 것이 아님)
- insert(룰, 인덱스);

```javascript
document.querySelector('.red').onclick=_=>{
    sheet.insertRule('.red{background:red}', rules.length)
    sheet.insertRule('.blue{background:blue}', rules.length)	
}
```

- 동적으로 룰을 추가해도 동작하는데, 이는 스타일시트에 변화가 생기면 브라우저가 리페인트를 수행하기 때문이다. 

## rule 삭제 :  deleteRule

```javascript
document.querySelector('.blue').onclick=_=>{
    sheet.deleteRule(rules.length)
}
```

- deleteRule(인덱스);



이는 DOM에 클래스를 주는 것보다 훨씬 resource 가 적게 드는 방법이다. DOM을 변경시키지 않고 스타일 시트만 껐다가 켰다가 하기 때문이다. 