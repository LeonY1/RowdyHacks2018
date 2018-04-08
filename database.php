<? php

$str = "input.json";
$json_a = json_decode($str, true);
$conn = mysqli_connect("localhost", "RowdyCrew", "rishytalhamichaelmarkleon")

if(mysqli_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Success"
}

$json_iterator = new RecursiveIteratorIterator(
	new RecursiveArrayIterator($json_a["favorites"]), RecursiveIteratorIterator::SELF_FIRST;

foreach ($json_iterator as $key => $val) {
	$sql = "INSERT INTO ClothesTable ";
	$value = "VALUES (";
	$product = $key["product"];
	if(stripos(strtolower($product["categories"]["name"]), "dress")){
		$sql .= "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
		$value .= "\"Dress\", ";
	}
	if(stripos(strtolower($product["categories"]["name"]), "shirt")){
		$sql .= "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
		$value .= "\"Shirt\", ";
	}
	if(stripos(strtolower($product["categories"]["name"]), "pants")){
		$sql .= "(Category, Price, Brand, In Stock, Image, Color, Pant Sizes)";
		$value .= "\"Pants\", ";
	}
	if(stripos(strtolower($product["categories"]["name"]), "jacket")){
		$sql .= "(Category, Price, Brand, In Stock, Image, Color, Shirt Sizes)";
		$value .= "\"Jacket\", ";
	}
	if(stripos(strtolower($product["categories"]["name"]), "shoe")){
		$sql .= "(Category, Price, Brand, In Stock, Image, Color, Shoe Sizes)";
		$value .= "\"Shoe\", ";
	}
	$value .= $product["price"] + ", ";
	$value .= "\"" + $product["brand"]["name"] + "\", ";
	$value .= $product["inStock"] + ", ";
	$value .= "\"" + $product["image"]["Large"]["url"] + "\", ";

	foreach ($product["stock"] as $key2 => $val2) {
		$temp = $value;
		$temp .= "\"" + $product["color"]["name"];
		echo $sql . $temp;
		mysqli_query($conn, $sql . $temp);
	}
}

mysqli_close($conn);
?>