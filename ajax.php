<?php
mysql_connect('localhost','root','');
mysql_select_db('ci_seller');
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT productCode, productName, buyPrice FROM products where quantityInStock !=0 and UPPER($type) LIKE '".strtoupper($name)."%'";
	$result = mysql_query($con, $query);
	$data = array();
	while ($row = mysql_fetch_assoc($result)) {
		$name = $row['productCode'].'|'.$row['productName'].'|'.$row['buyPrice'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}

?>
