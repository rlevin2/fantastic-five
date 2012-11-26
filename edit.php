<html>
<body bgcolor = "lightgray">
<form action="reviewEditedItem.php" method="post" name="form">
<title>Admin: edit item</title>


<?php
	$itemID = 0;
	$name = $_POST['name'];
	$con = @mysql_connect("studentdb.gl.umbc.edu","ekene3","fantastic");
	if (!$con)
	{
	   die('Could not connect: ' . @mysql_error());
	}

	@mysql_select_db("ekene3", $con);

	$result = @mysql_query("SELECT * FROM Inventory WHERE itemName = '$name' ");
	While($row = @mysql_fetch_array($result)){
		echo "<input type='" . hidden . "' name = '" . itemId . "' value = '". $row['itemId'] . "'>";
		echo "Name:<br />";
		echo "<input type = '" . text . "' name = '" . name . "' value = '" . $row['itemName'] . "'>";
		echo "<br /><br />price:<br />";
		echo "<input type = '" . text . "' name = '" . price . "' value = '" . $row['price'] . "'>";
		echo "<br /><br />catagory<br />";
		echo "<input type = '" . text . "' name = '" . catagory . "' value = '" . $row['catagory'] . "'>";
		echo "<br /><br />decription<br />";
		echo "<textarea rows= '". 10 . "' cols='" . 50 . "' name = '" . description . "' value = '".$row['desctiption']."'>".$row['description']."</textarea>";
		echo "<br /><br />quantity<br />";
		echo "<input type = '" . text . "' name = '" . quantity . "' value = '" . $row['quantity'] . "'>";
	}

	mysql_close($con);

?>
<br /><br />
<input type ="submit" name = "form" value ="edit item" >
</body>
</html>