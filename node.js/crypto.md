# crypto



createHash

```javascript
const crypto = require('crypto');
const serialized = crypto.createHash('sha512').update('password').digest('base64')
```



pbkdf2