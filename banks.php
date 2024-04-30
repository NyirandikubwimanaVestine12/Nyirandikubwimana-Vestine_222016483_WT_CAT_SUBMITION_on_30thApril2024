<?php 
include"dbconnection.php";
include"menutop.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user_id=$_POST['user_id'];
	$bank_account=$_POST['bank_account'];
	$bank_name=$_POST['bank_name'];
	$transaction_name=$_POST['transaction_name'];
	$amounts=$_POST['amounts'];
	$sql="INSERT INTO bank(user_id,bank_account,bank_name,transaction_name,amounts) VALUES('$user_id','$bank_account','$bank_name','$transaction_name','$amounts')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewbank.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}
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
			background-color: deepskyblue;
			width: 110px;
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
			width: 110px;
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
<form method="POST" class="sp" onsubmit="return confirmInsert();">
	<h3 style="color:darkviolet;">BANK FORM</h3>
	    <label>User Name</label><br>
    <select name="user_id" id="user_id" class="input"> 
    	  	<!-- here are php code that help to retrieve user_id on bank on screen you see username but in database save user id-->
        <?php
        $query = "SELECT user_id,name FROM user";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $name=$row['name'];
                echo "<option value=\"$user_id\"> $name</option>";
            }
        }
        ?>
    </select><br>
    <label>Bank Account</label><br>
    <input type="text" name="bank_account" required class="input"><br>
    <label>Bank Name</label><br>
    <input type="text" name="bank_name" class="input" required><br>  
    <label>Transaction Name</label><br>
    <input type="text" name="transaction_name" required class="input"><br> 
    <label>Amounts</label><br>
    <input type="text" name="amounts" required class="input"><br>
    <input type="submit" name="submit" value="Add" class="sb">
    <input type="reset" name="reset" value="Cancel" class="cn">
</form>
</section>
</center>
		<footer>
			<!-- Footer section -->
			<p style="color:blue;">&copy copy right&reg Vestine_222016483_CBE_BIT_Year2_Group_Two. </p>
		</footer>
</body>
</html>
