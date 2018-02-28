### concat 명령어 : 컬럼의 텍스트를 합쳐서 출력
```
select replace(concat(maker_name, car_name_detail),' ', '') as fullname
from car_master as cm join maker_master as mm on cm.maker_index=mm.maker_index
order by length(fullname) desc
```
