<?php 
//call the file that contain database connection
include"dbconnection.php";
//include"menutop.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["product_id"])) {
   header("location:viewproduct.php");
   exit;
  }
  $product_id = $_GET["product_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM product WHERE product_id=$product_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productname = $row["productname"];
        $user_id = $row["user_id"];
        $quantityavailable = $row["quantityavailable"];
        $price = $row["price"];
        $add_date = $row["add_date"];
    } else {
        header("location: /Enterprise_management_system/viewproduct.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST["product_id"];
    $productname = $_POST["productname"];
    $user_id = $_POST["user_id"];
    $quantityavailable = $_POST["quantityavailable"];
    $price = $_POST["price"];
    $add_date=$_POST['add_date'];
    if (empty($product_id) || empty($productname) || empty($user_id) || empty($quantityavailable) || empty($price) || empty($add_date)) {
        echo "All feil are required!";
    }else {
        $sql = "UPDATE product SET productname='$productname', user_id='$user_id', quantityavailable='$quantityavailable', price='$price',add_date='$add_date' WHERE product_id='$product_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo "product information updated successfully";
        header("location:/Enterprise_management_system/viewproduct.php");
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
	<h3 style="color:mediumvioletred;">UPDATE PRODUCT HERE</h3>
	<section class="forms">
<form method="POST" onsubmit="return confirmUpdate();">
	<label>Product Id</label><br>
    <input type="text" name="product_id" class="input" readonly value="<?php echo $product_id;?>"><br> 
    <label>Product Name</label><br>
    <input type="text" name="productname" class="input" value="<?php echo $productname;?>"><br> 
    <label>User Id</label><br>
     <input type="text" name="user_id" class="input" readonly value="<?php echo $user_id;?>"><br> 
    <label>Quantity Available</label><br>
    <input type="text" name="quantityavailable" value="<?php echo $quantityavailable;?>" class="input"><br> 
    <label>Price of Product</label><br>
    <input type="text" name="price" value="<?php echo $price;?>" class="input"><br> 
    <label>Added Date</label><br>
    <input type="date" name="add_date" value="<?php echo $add_date;?>" class="input"><br>
    <input type="submit" name="submit" value="UPDATE" class="sb">
</form>
</section>
</center>
		<footer>
			<!-- Footer section -->
			<p style="color:blue; text-align: center; margin-top:40px;">&copy copy right&reg Vestine_222016483_CBE_BIT_Year2_Group_Two. </p>
		</footer>
</body>
</html>