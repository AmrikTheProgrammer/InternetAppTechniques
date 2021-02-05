const express = require('express');

var app = express();
app.use(require('./routes/hello.js'));

const port = 3000;
app.listen(port,function(){
  console.log('Listening on port ' + port);
});
