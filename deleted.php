<html>
<body bgcolor = "lightgray">
<title>Admin: delete item</title>

<?php

	$name = $_POST['name'];
	$con = @mysql_connect("studentdb.gl.umbc.edu","ekene3","fantastic");
	if (!$con)
	{
	   die('Could not connect: ' . @mysql_error());
	}

	@mysql_select_db("ekene3", $con);

	$result = @mysql_query("DELETE FROM Inventory WHERE ItemName = '$name' ");

	echo $name . " has been deleted from Inventory";

	mysql_close($con);

?>
<br /><br />
<form action="deleteItem.php" method="post" name="form">
<input type ="submit" value="delete another item">
</form>
<form action="Administrator.html" name="admin">
<input type ="submit" value="Admin Home Page">
</form>
</form>
</html>