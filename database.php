<?php
$input = "input.txt";
$servername = "localhost";
$username = "root";
$password = "gtforoot315961";
$dbname = "mydb";

$myfile = fopen($input, "r") or die("Unable to open file!");
$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Success";
}

while(!feof($myfile)){
	
	$result = mysqli_query($conn, fgets($myfile))or die('error getting data');
}

fclose($input);
mysqli_close($conn);
?>