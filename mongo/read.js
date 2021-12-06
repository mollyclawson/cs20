const MongoClient = require('mongodb').MongoClient;
const url = "mongodb+srv://mollyclaw:Whiplash2015@cluster0.yqtdj.mongodb.net/myFirstDatabase?retryWrites=true&w=majority";  // connection string goes here
const fs = require('fs')

// const mongo = new MongoClient(url, { useNewUrlParser: true, useUnifiedTopology: true });

// MongoClient.connect(url, { useUnifiedTopology: true }, function(err, db) {
//   if(err) { return console.log(err); return;}
  
//   var dbo = db.db("stock-ticker");
//   var collection = dbo.collection("companies");
    
//   console.log("Success!");
  
//   var newData = {"title": "Who Ate the Cheese", "author": "Fin Haddie",pages:2};
// 	collection.insertOne(newData, function(err, res) {
//     if(err) { console.log("query err: " + err); return; }
//     console.log("new document inserted");
// 	  });
  
//   // db.close();

// });












  
  // function(err, db) {
  //   if(err) { return console.log(err); return;}
    
  //     var dbo = db.db("stock-ticker");
  //     var collection = dbo.collection("companies");
      
  //     console.log("Success!");

  //     fs.readFile('companies.csv', 'utf8' , (err, data) => {
  //       if (err) {
  //         console.error(err)
  //         return
  //       }
  //       var dataArr = data.split("\r\n");

  //       for (i = 1; i < dataArr.length - 1; i++) {
  //         var split = dataArr[i].split(",");
  //         var newData = {"Company": split[0], "Ticker": split[1]};
  //         collection.insertOne(newData);
  //         console.log(newData);
  //       }
  //     })

      

      // db.close();
   

