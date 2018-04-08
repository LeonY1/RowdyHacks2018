<?php
$input = "input.txt";
$servername = "localhost";
$username = "RowdyCrew";
$password = "rishytalhamichaelmarkleon";
$dbname = "myDB";

$myfile = fopen($input, "r") or die("Unable to open file!");
$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Success";
}

while(!feof($myfile)){
	if($conn->query(fgets($myfile))===TRUE)
		echo "New record created successfully";
	else 
		echo "Error". sql . "<br>" . $conn->error;
}

fclose($input);
mysqli_close($conn);
?>