<html>
<body bgcolor = "lightgray">
<form action="editItem.php" method="post" name="form">
<title>Admin: delete item</title>

<?php

	$name = $_POST['name'];
	$con = @mysql_connect("studentdb.gl.umbc.edu","ekene3","fantastic");
	if (!$con)
	{
	   die('Could not connect: ' . @mysql_error());
	}

	@mysql_select_db("ekene3", $con);

	$result = @mysql_query("SELECT FROM Inventory WHERE itemName = '$name' ");
	While($row = @mysql_fetch_array($result)){
		
	}

	mysql_close($con);

?>
<br /><br />
<input type ="submit" value="edit another item">
</body>
</html>