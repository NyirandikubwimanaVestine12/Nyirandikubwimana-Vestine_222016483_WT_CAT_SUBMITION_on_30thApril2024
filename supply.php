<?php 
include"dbconnection.php";
include"menutop.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterprice Management system</title>
			<script>
		function confirmInsert(){
			return confirm('Do you want to insert this record?');
		}
	</script>
	<style>
		h2{
			font-family:Castellar;
			color: darkblue;
		}
		label{
			font-family: Palatino Linotype;
		}
		.sb{
			font-family:Georgia;
			padding: 10px;
			border-color: blue;
			background-color: greenyellow;
			width: 90px;
			margin-top: 5px;
			border-radius: 12px;
			font-weight: bold;

		}
		.sb:hover{
			background-color: oldlace;
		}
		.cn{
			font-family:Georgia;
			padding: 10px;
			border-color:red;
			background-color: orangered;
			width: 90px;
			margin-top: 5px;
			border-radius: 12px;
			font-weight: bold;

		}
		.cn:hover{
			background-color: white;
		}
		.input{
			width: 300px;
			height: 35px;
			border-radius: 12px;
			border-color: limegreen;
		}
		.sp{
			border: 2px solid white;
			width: 500px;
			height: 550px;
		}

	</style>
</head>
<body>
<center>
	
	<h2>ENTERPRISE MANAGEMENT SYSTEM </h2>
	<section class="forms">
<form action="supplier.php" method="POST" class="sp" onsubmit="return confirmInsert();">
	<h3 style="color:green;">SUPPLIERS FORM</h3>
    <label>Product Name</label><br>
    <select name="product_id" id="product_id" class="input"> 
    	  	<!-- here are php code that help to retrieve product_id on supply on screen you see product name and its id but in database save product id-->
        <?php
        $query = "SELECT product_id,productname FROM product";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $productname=$row['productname'];
                echo "<option value=\"$product_id\">$product_id $productname</option>";
            }
        }
        ?>
    </select><br>
    <label>Supplier Name</label><br>
    <input type="text" name="supplyname" class="input" required><br> 
    <label>Phone Number</label><br>
    <input type="text" name="phone" required class="input"><br> 
    <label>Price of Product</label><br>
    <input type="text" name="price" required class="input"><br>
    <label>Email</label><br>
    <input type="text" name="email" class="input" required><br>  
    <label>Supply_Date</label><br>
    <input type="date" name="supply_date" required class="input"><br>
    <input type="submit" name="submit" value="SUPPLY" class="sb">
    <input type="reset" name="reset" value="CANCEL" class="cn">
</form>
</section>
</center>
		<footer>
			<!-- Footer section -->
			<p style="color:blue;">&copy copy right&reg Vestine_222016483_CBE_BIT_Year2_Group_Two. </p>
		</footer>
</body>
</html>
