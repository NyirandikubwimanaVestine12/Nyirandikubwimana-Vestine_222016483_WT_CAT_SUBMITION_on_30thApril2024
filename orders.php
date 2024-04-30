<?php
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user_id=$_POST['user_id'];
	$product_id=$_POST['product_id'];
	$quantity=$_POST['quantity'];
	$paymentmethods=$_POST['paymentmethods'];
	$phone=$_POST['phone'];
	$order_date=$_POST['order_date'];
	$sql="INSERT INTO customerorders(user_id,product_id,quantity,paymentmethods,phone,order_date) VALUES('$user_id','$product_id','$quantity','$paymentmethods','$phone','$order_date')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:vieworder.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

?>