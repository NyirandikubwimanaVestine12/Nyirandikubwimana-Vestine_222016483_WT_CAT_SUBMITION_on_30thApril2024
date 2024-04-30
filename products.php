<?php 
include"dbconnection.php";
include"menutop.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterprise Management system</title>
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
			background-color: white;
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
			height: 500px;
		}

	</style>
</head>
<body>
<center>
	
	<h2>ENTERPRISE MANAGEMENT SYSTEM </h2>
	
	<section class="forms">
<form action="product.php" method="POST" class="sp" onsubmit="return confirmInsert();">
	<h3 style="color:mediumvioletred;">PRODUCT FORM</h3>
    <label>Product Name</label><br>
    <input type="text" name="productname" class="input" required><br> 
    
    <label>User Name</label><br>
    <select name="user_id" id="user_id" class="input"> 
    	<!-- here are php code that help to retrieve user_id on product on screen you see username but in database save user id-->
        <?php
        $query = "SELECT user_id,name FROM user";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $name= $row['name'];
                echo "<option value=\"$user_id\">$name</option>";
            }
        } else {
            echo "<option value=\"\">No users found</option>";
        }
        ?>
    </select><br>
    <label>Quantity Available</label><br>
    <input type="text" name="quantityavailable" required class="input"><br> 
    <label>Price of Product</label><br>
    <input type="text" name="price" required class="input"><br> 
    <label>Added Date</label><br>
    <input type="date" name="add_date" required class="input"><br>
    <input type="submit" name="submit" value="ADD" class="sb">
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
