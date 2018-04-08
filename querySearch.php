<html>
<head>
   <title>Cloth Search</title>
   <style type="text/css">
   
   table {
		background-color: #FCF;
	}
	
	th {
		width: 150px;
		text-align: left;
	}
	
	</style>
</head>
<body>
<h1>Cloth Search</h1>

<form method="post" action ="querySearch.php">
<input type="hidden" name ="submitted" value ="true" />

<label>Search Category:

<select name = 	"category">
	<option value = "shoe">Shoe</option>
	<option value = "pant">Pants</option>
	<option value = "shirt">Shirts</option>
</select>
</label>

<label> Search Criteria: <input type = "text" name "criteria" /></label>

<input type = "submit" />


</form>

<?php

	if(isset($_POST['submitted'])) {
	//connect to the database
	include('testcon.php');
	
	$category = %_POST['catergory'];
	$critera = %_POST['critera'];
	$query = "SELECT * FROM clothes WHERE $category = '$critera'"
	$result = mysqli_query($conn, $query) or die('error getting data');
	
	echo "<table>";
	echo "<tr><th>Shoes</th> <th>Shirts</th> <th>Pants</th> </tr>";
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	
		echo "<tr><td>";
		echo $row['shoe'];
		echo "</td><td>"
		echo $row['shirt'];
		echo "</td><td style = 'text-align:right'>"
		echo $row['pant'];
		echo "</td></td>"
	
	}
	
	
	echo "</table>";
	}//end of main if statement

?>

</form>

</body>
</html>