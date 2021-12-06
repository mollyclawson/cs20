const MongoClient = require('mongodb').MongoClient;
const url = "mongodb+srv://mollyclaw:Whiplash2015@cluster0.yqtdj.mongodb.net/myFirstDatabase?retryWrites=true&w=majority"; 
const fs = require('fs');

MongoClient.connect(url, function(err, db) {
  if (err) throw err;
  var dbo = db.db("stock-ticker");

  fs.readFile('companies.csv', 'utf8', (err, data) => {
    if (err) {
      console.log(err);
      return;
    }

    var dataArr = data.split("\r\n");
    var toInsert = new Array;

    for (i = 1; i < dataArr.length - 1; i++) {
      var split = dataArr[i].split(",");
      var newData = {"Company": split[0], "Ticker": split[1]};
      toInsert[i - 1] = newData;
    }

    dbo.collection("companies").insertMany(toInsert, function(err, res) {
      if (err) throw err;
      console.log("1 document inserted");
      db.close();
    });

  // dbo.collection("companies").deleteMany({});

  });
});