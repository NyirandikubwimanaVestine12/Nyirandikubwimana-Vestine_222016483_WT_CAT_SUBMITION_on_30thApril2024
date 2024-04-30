<?php 
//call the file that contain database connection
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["supply_id"])) {
   header("location:viewsupplier.php");
   exit;
  }
  $supply_id = $_GET["supply_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM supplier WHERE supply_id=$supply_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = $row["product_id"];
        $supplyname = $row["supplyname"];
        $phone = $row["phone"];
        $price = $row["price"];
        $email = $row["email"];
        $supply_date = $row["supply_date"];
    } else {
        header("location: /Enterprise_management_system/viewsupplier.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supply_id = $_POST["supply_id"];
    $product_id = $_POST["product_id"];
    $supplyname = $_POST["supplyname"];
    $phone = $_POST["phone"];
    $price = $_POST["price"];
    $email=$_POST['email'];
    $supply_date=$_POST['supply_date'];
    if (empty($product_id) || empty($product_id) || empty($supplyname) || empty($phone) || empty($price) || empty($email) || empty($supply_date)) {
        echo "All feil are required!";
    }else {
        $sql = "UPDATE supplier SET product_id='$product_id', supplyname='$supplyname', phone='$phone', price='$price',email='$email',supply_date='$supply_date' WHERE supply_id='$supply_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:/Enterprise_management_system/viewsupplier.php");
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
	<h3 style="color:green;">UPDATE SUPPLIER HERE</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST" onsubmit="return confirmUpdate();">
	<label>Supply Id</label><br>
    <input type="text" name="supply_id" readonly class="input" value="<?php echo $supply_id; ?>"><br>
    <label>Product Id</label><br>
    <input type="text" name="product_id" readonly class="input" value="<?php echo $product_id; ?>"><br>
    <label>Supplier Name</label><br>
    <input type="text" name="supplyname" class="input" value="<?php echo $supplyname; ?>"><br> 
    <label>Phone Number</label><br>
    <input type="text" name="phone" value="<?php echo $phone; ?>" class="input"><br> 
    <label>Price of Product</label><br>
    <input type="text" name="price" value="<?php echo $price; ?>" class="input"><br>
    <label>Email</label><br>
    <input type="text" name="email" class="input" value="<?php echo $email; ?>"><br>  
    <label>Supply_Date</label><br>
    <input type="date" name="supply_date" value="<?php echo $supply_date; ?>" class="input"><br>
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
















