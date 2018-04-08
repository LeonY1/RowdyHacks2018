<?php
	$servername = "localhost";
	$username = "root";
	$password = "gtforoot315961";

	//making the connection
	$conn = new mysqli($servername, $username, $password);

	//select the db
	//$dbcon = mysql_select_db(mydb);

	if($conn->connect_error) {
		die('error connecting to database');
	}

	echo 'you have connceted'
?>