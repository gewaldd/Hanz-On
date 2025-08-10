function addDBuy(){
      var mysql =require("mysql")
      var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "product"
        });
        
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        //Insert a record in the "customers" table:
        var sql = "INSERT INTO table1 (ID, Name, Quantity, Price) VALUES ('1', 'SilentHill' , '1' , '29')";
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("1 record inserted");
        });
      });
    }