<html>
<body bgcolor = "lightgray">

<?php

	$name = $_POST['name'];
	$name1 = strtoupper($name);
	$description = $_POST['description'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$catagory = $_POST['catagory'];
	$itemId = $_POST['itemId'];
	
	
	$con = @mysql_connect("studentdb.gl.umbc.edu","ekene3","fantastic");
	if (!$con)
	{
	   die('Could not connect: ' . @mysql_error());
	}

	@mysql_select_db("ekene3", $con);
	
	if(is_null($name) or $name == ""){
		echo "the name selected is not valid, item not edited";
	}
	
	else if(!is_numeric($price)){
		echo "The price " . $price . " you entered is not valid, item not edited<br /><br />";
	}
	
	
	else{
		@mysql_query("UPDATE Inventory SET itemName = '$name1', description = '$description', price = '$price', quantity = '$quantity', catagory = '$catagory' WHERE itemId = '$itemId' ");
		echo "Item below has been edited<br /><br />";
	}

	$result = @mysql_query("SELECT * FROM Inventory WHERE itemId = '$itemId' ");
	While($row = @mysql_fetch_array($result)){
		echo "Item ID:  ";
		echo $row['itemId'];
		echo "<br />";
		echo "Price:  ";
		echo "$" . $row['price'];
		echo "<br />";
		echo "catagory:  ";
		echo $row['catagory'];
		echo "<br />";
		echo "Name of item:  ";
		echo $row['itemName'];
		echo "<br />";
		echo "quantity:  ";
		echo $row['quantity'];
		echo "<br />";
		echo "Description:  ";
		echo $row['description'];
		echo "<br /> <br />";
	}	

	mysql_close($con);
?>

<br /><br />
<form action="editItem.php" name="exists">
<input type ="submit" value="edit another item" name ="exists" >
</form>
<form action = "Administrator.html" name = "admin">
<input type ="submit" value="Admin Page" name ="admin" >
</form>
<form action = "home.html" name = "form1">
<input type ="submit" value="return to home page" name ="form1" >
</form>

</html>
</body>