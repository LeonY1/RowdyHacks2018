var http = require('http');
var mysql = require('mysql');
var website = 'http://www.shopstyle.com/api/v2/products/?pid=uid5769-40809363-11';

function get_json(url){
	http.get(url, function(res){
		var body = '';
		res.on('data', function(chunk){
			body += chunk;
		})

		res.on('end', function(){
			var response = JSON.parse(body);
			return response;
		});
	});
}

var con = mysql.createConnection({
	host: "localhost",
	user: "RowdyCrew",
	password: "rishytalhamichaelmarkleon"
});

var pulled_data = get_json(website);

console.log(pulled_data);

// con.connect(function(err){
// 	if(err) throw err;

// 	console.log("Connected");

// 	for (var item in pulled_data["favorites"]) {
// 		var sql = "INSERT INTO ClothesTable ";
// 		var value = " VALUES (";
// 		product = item["product"];

// 		if(product["categories"]["name"].toLowerCase().includes("dress")){
// 			sql += "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
// 			value += "\'Dress\', ";
// 		}
// 		else if(product["categories"]["name"].toLowerCase().includes("shirt")){
// 			sql += "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
// 			value += "\'Shirt\', ";
// 		}
// 		else if(product["categories"]["name"].toLowerCase().includes("pants")){
// 			sql += "(Category, Price, Brand, In Stock, Image, Color, Pant Sizes)";
// 			value += "\'Pants\'"
// 		}
// 		else if(product["categories"]["name"].toLowerCase().includes("jacket")){
// 			sql += "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
// 			value += "\'Jacket\'"
// 		}
// 		else if(product["categories"]["name"].toLowerCase().includes("shoe")){
// 			sql += "(Category, Price, Brand, In Stock, Image, Color, Shoe Sizes)";
// 			value += "\'Shoe\'"
// 		}
// 		value += product["price"] + ", ";
// 		value += "\'" + product["brand"]["name"] + "\', ";
// 		value += product["inStock"] + ", ";
// 		value += "\'" + product["image"]["Large"]["url"] + "\', ";
// 		for(var items in property["stock"]){
// 			var temp = value;
// 			temp += "\'" + items["color"]["name"] + "\', \'" + items["size"]["name"] +"\')";
// 			con.query(sql + temp, function(err, result){
// 				if(err) throw err;
// 				console.log("Record placed");
// 			});
// 		}
// 	}

// })