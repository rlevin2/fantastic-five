<html>
<body bgcolor = "lightgray">

<title>Admin: Add Item</title>
<?php
	
	$name1 = $_POST['name'];
	$name = strtoupper($name1);
	$price3 = $_POST['price3'] *100;
	$price2 = $_POST['price2'] *10;
	$price1 = $_POST['price1'];
	$priceTens = $_POST['priceTens'] *.1;
	$priceHundreds = $_POST['priceHundreds'] *.01;
	$catagory = $_POST['catagory'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$itemId = 1;
	$price = $price3 + $price2 + $price1 +$priceTens + $priceHundreds;
	$itemExists = 0;
	$newQuantity = 1;
$con = @mysql_connect("studentdb.gl.umbc.edu", "ekene3", "fantastic");
if(!$con)
{
	die('could not connect: ' . @mysql_error());
}

@mysql_select_db("ekene3", $con);
$result = @mysql_query("SELECT * FROM Inventory WHERE itemName='$name'");
while($row = @mysql_fetch_array($result)){
	if($row['itemName'] == $name){
		$itemExists = 1;
		echo "Item already exists, to add inventory to this item please select it from the edit page<br />";
		echo "<br /><br /><br />";
		
	}
}
if($itemExists == 0){
	@mysql_query("INSERT INTO Inventory (price, catagory, itemName, quantity, description)
	VALUES ('$itemId', 
	'$catagory',
	'$name',
	'$quantity',
	'$description' )");
}
//else{
//	$result = @mysql_query("SELECT * FROM Inventory WHERE itemName = '$name'");
//	While($row = @mysql_fetch_array($result)){		
//		$newQuantity = $row['quantity'] + $quantity;
//	}
//	$result = @mysql_query("UPDATE Inventory SET quantity = '$newQuantity' WHERE itemName = '$name'" );
//}

	$result = @mysql_query("SELECT * FROM Inventory WHERE itemName='$name'");
	While($row = @mysql_fetch_array($result)){
		echo "Item ID:  ";
		echo $row['itemId'];
		echo "<br />";
		echo "$" . "Price:  ";
		echo $row['price'];
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

?>
<br /><br />
<form action="editItem.php" name="exists">
<input type ="submit" value="edit this item" name ="exists" >
</form>
<form action="addItem.html" name="form">
<input type ="submit" value="add another item" name ="form" >
</form>
<form action = "Administrator.html" name = "admin">
<input type ="submit" value="Admin Page" name ="admin" >
</form>
<form action = "home.html" name = "form1">
<input type ="submit" value="return to home page" name ="form1" >
</form>

</body>
</html>
