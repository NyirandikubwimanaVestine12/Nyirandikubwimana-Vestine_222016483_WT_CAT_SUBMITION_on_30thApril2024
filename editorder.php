<?php 
//call the file that contain database connection
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $order_id = $_GET["order_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM customerorders WHERE order_id=$order_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id=$row['user_id'];
        $product_id = $row["product_id"];
        $quantity = $row["quantity"];
        $paymentmethods = $row["paymentmethods"];
        $phone = $row["phone"];
        $order_date = $row["order_date"];
    } else {
        header("location: /Enterprise_management_system/vieworder.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST["order_id"];
    $user_id= $_POST['user_id'];
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    $paymentmethods = $_POST["paymentmethods"];
    $phone = $_POST["phone"];
    $order_date=$_POST['order_date'];
    if (empty($order_id) || empty($user_id)|| empty($product_id) || empty($quantity) || empty($paymentmethods) || empty($phone) || empty($order_date)) {
        echo "All feild are required!";
    }else {
        $sql = "UPDATE customerorders SET user_id='$user_id', product_id='$product_id', quantity='$quantity', paymentmethods='$paymentmethods', phone='$phone',order_date='$order_date' WHERE order_id='$order_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:/Enterprise_management_system/vieworder.php");
    }else {
        echo "Error updating record: " . $connection->error;
    
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterprise Management system</title>
	<script>
        function confirmUpdate() {
            return confirm('Do you want to update this record?');
        }
    </script>
	<style>
		h2{
			font-family:Castellar;
			color: darkblue;
		}
		label{
			font-family: elephant;
			font-size: 20px;
		}
		.sb{
			font-family:Georgia;
			padding: 10px;
			border-color: blue;
			background-color: skyblue;
			width: 200px;
			margin-top: 5px;
			border-radius: 12px;
			font-weight: bold;
			color: blue;

		}

		.input{
			width: 350px;
			height: 35px;
			border-radius: 12px;
			border-color: green;
		}

	</style>
</head>
<body>
<center>
	
	<h2>ENTERPRISE MANAGEMENT SYSTEM </h2>
	<h3 style="color:green;">UPDATE ORDERS HERE</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST" onsubmit="return confirmUpdate();">
	<label>Order Id</label><br>
    <input type="text" name="order_id" readonly class="input" value="<?php echo $order_id; ?>"><br>
    <label>User Id</label><br>
    <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
     <label>Product Id</label><br>
    <input type="text" name="product_id" readonly class="input" value="<?php echo $product_id; ?>"><br>
    <label>quantity</label><br>
    <input type="text" name="quantity" class="input" value="<?php echo $quantity; ?>"><br> 
    <label>paymentmethods </label><br>
    <input type="text" name="paymentmethods" value="<?php echo $paymentmethods; ?>" class="input"><br> 
    <label>phone Number</label><br>
    <input type="text" name="phone" value="<?php echo $phone; ?>" class="input"><br>  
    <label>order_date</label><br>
    <input type="date" name="order_date" value="<?php echo $order_date; ?>" class="input"><br>
    <input type="submit" name="submit" value="Update" class="sb">
</form>

</section>
</center>
		<footer>
			<!-- Footer section -->
			<p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy copy right&reg Vestine_222016483_CBE_BIT_Year2_Group_Two.</marquee> </p>
		</footer>
</body>
</html>
















