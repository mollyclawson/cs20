var http = require('http');
http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type':'text/html'});
    if (req.url == "/") {
        res.write("This is the home page");
        res.write("<a href= '/about' >Learn About Us</a>")
    } else if (req.url == "/about")
        res.write ("This is the about page");
     else 
        res.write ("Unknown page request");
    res.end();
}).listen(8080);