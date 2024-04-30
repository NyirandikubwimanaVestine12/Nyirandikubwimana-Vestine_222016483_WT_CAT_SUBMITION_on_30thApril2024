<?php
//call the file that contain database connection
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$product_id=$_POST['product_id'];
	$supplyname=$_POST['supplyname'];
	$phone=$_POST['phone'];
	$price=$_POST['price'];
	$email=$_POST['email'];
	$supply_date=$_POST['supply_date'];
	$sql="INSERT INTO supplier(product_id,supplyname,phone,price,email,supply_date) VALUES('$product_id','$supplyname','$phone','$price','$email','$supply_date')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewsupplier.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

  ?>