<?php
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$pname=$_POST['productname'];
	$userid=$_POST['user_id'];
	$quantity=$_POST['quantityavailable'];
	$price=$_POST['price'];
	$adddate=$_POST['add_date'];
	$sql="INSERT INTO product(productname,user_id,quantityavailable,price,add_date) VALUES('$pname','$userid','$quantity','$price','$adddate')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewproduct.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

  ?>