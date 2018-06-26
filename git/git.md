# git 공부한 내용
- vim 대신  으로 파일 내용 확인 가능
```
cat 파일명
```

- 최초에 깃레포지토리 만들었을때 설정해주는 사용자 이름.
```
git config --globla user.email username
```

- git add 취소 명령어 
 ```
 git reset 
 ```

- 깃 변경사항 확인
```
git log -p
```

- 버전별 차이점 확인
``` 
git diff 체크섬..체크섬: 
```

- 변경이 된 파일을 자동으로 add 하여 커밋
```
git commit -a
```

- 커밋메시지를 작성함과 동시에 커밋
```
git commit -m "메시지" 
```

- 변경된 파일 ADD, 커밋메시지 작성하여 바로 커밋
```
git commit -am "메시지"
```

## reset과 revert


## 작업 순서
PULL -> WORK -> COMMIT -> PULL -> PUSH

