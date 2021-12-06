var http = require('http');
var menuObj = require ('./menu.js')

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write("Hot dog:" + menuObj.menu.hotdog + "<br>");
    res.write("Fries:" + menuObj.menu.fries + "<br>");
    res.write("Soda:" + menuObj.menu.soda + "<br>");
    res.end();
  }).listen(8080);