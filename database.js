var mysql = require('mysql');

function get_json(url, callback){
	http.get(url, function(res){
		var body = '';
		res.on('data', function(chunk){
			body += chunk;
		})

		res.on('end', function(){
			var response = JSON.parse(body);
			callback(response);
		});
	});
}

var con = mysql.createConnection({
	host: "localhost",
	user: "RowdyCrew",
	password: "rishytalhamichaelmarkleon"
});

con.connect(function(err){
	if(err) throw err;
	console.log("Connected");
	//var sql = "INSERT INTO ClothesTable (Category, Price, Color, Retailer, Sizes, Shoe Size) VALUES "
})