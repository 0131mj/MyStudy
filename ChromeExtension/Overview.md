# 크롬 확장도구

manifest : 기본적인 골격이 되는 파일

background

```javascript
{
  "name": "My Extension",
  "version": "2.1",
  "description": "Gets information from Google.",
  "icons": { "128": "icon_128.png" },
  "background": {
    "persistent": false,
    "scripts": ["bg.js"]
  },
  "permissions": ["http://*.google.com/", "https://*.google.com/"],
  "browser_action": {
    "default_title": "",
    "default_icon": "icon_19.png",
    "default_popup": "popup.html"
  }
}
```

- 사이트를 지정할 수 있는데, 사이트 지정 후에는 브라우저를 재시작 해줘야 함.

