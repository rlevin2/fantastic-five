<html>
<head>
<title>Admin: Delete Item</title>
</head>
<body bgcolor = "lightgray">

<form action="deleted.php" method="post" name="Form">
<br />
<h1 style="text-align:center;">
<br />
<font size="5" face="arial" color="brown">
Select the item that you would like to delete from Inventory
</font>
<br /><br />

<?php
	$con = @mysql_connect("studentdb.gl.umbc.edu","ekene3","fantastic");
	if (!$con)
	{
	   die('Could not connect: ' . @mysql_error());
	}
	@mysql_select_db("ekene3", $con);

	$result = @mysql_query("SELECT * FROM Inventory order by itemName");
	echo "<select name = 'name'>";
	echo "<option value = '".''."'>".''."</option>";
	while($row = mysql_fetch_array($result)){
	   echo "<option value = '".$row['itemName']."'>".$row['itemName']."</option>";
	}

	echo "</select>";
?>

<input type ="submit" value="submit">
</h1>
</body>
</html>