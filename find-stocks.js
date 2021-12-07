const MongoClient = require('mongodb').MongoClient;
const url = "mongodb+srv://mollyclaw:Whiplash2015@cluster0.yqtdj.mongodb.net/myFirstDatabase?retryWrites=true&w=majority"; 
var port = process.env.PORT || 3000;


var http = require('http');
http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type':'text/html'});

    MongoClient.connect(url, function(err, db) {
        if (err) throw err;
        var dbo = db.db("stock-ticker");
        var coll = dbo.collection("companies");
      
        theQuery="";
        coll.find(theQuery).toArray(function(err, items) {
            if (err) {
              res.write("Error: " + err);
            } 
            else 
            {
              for (i=0; i<items.length; i++)
                  res.write(items[i].Company + " " + items[i].Ticker + "<br>");				
            }
            db.close();
            console.log("after close");
        });
      
      });

}).listen(port);

