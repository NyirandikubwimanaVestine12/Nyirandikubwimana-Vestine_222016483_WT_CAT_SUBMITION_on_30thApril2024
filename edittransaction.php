<?php 
//call the file that contain database connection
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["transaction_id"])) {
   header("location:viewtransaction.php");
   exit;
  }
  $transaction_id = $_GET["transaction_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM transaction WHERE transaction_id=$transaction_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id=$row['user_id'];
        $transaction_name = $row["transaction_name"];
        $transaction_type = $row["transaction_type"];
        $amounts = $row["amounts"];
        $transaction_date = $row["transaction_date"];
    } else {
        header("location: /Enterprise_management_system/viewtransaction.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaction_id = $_POST["transaction_id"];
    $user_id= $_POST['user_id'];
    $product_id = $_POST["product_id"];
    $transaction_name = $_POST["transaction_name"];
    $transaction_type = $_POST["transaction_type"];
    $amounts = $_POST["amounts"];
    $transaction_date=$_POST['transaction_date'];
    if (empty($transaction_id) || empty($user_id) || empty($transaction_name) || empty($transaction_type) || empty($amounts) || empty($transaction_date)) {
        echo "All feild are required!";
    }else {
        $sql = "UPDATE transaction SET user_id='$user_id', transaction_name='$transaction_name', transaction_type='$transaction_type', amounts='$amounts',transaction_date='$transaction_date' WHERE transaction_id='$transaction_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:/Enterprise_management_system/viewtransaction.php");
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
	<h3 style="color:green;">UPDATE TRANSACTIONS HERE</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST" onsubmit="return confirmUpdate();">
	<label>Transaction Id</label><br>
    <input type="text" name="transaction_id" readonly class="input" value="<?php echo $transaction_id; ?>"><br>
    <label>User Id</label><br>
    <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
    <label>transaction_name</label><br>
    <input type="text" name="transaction_name" class="input" value="<?php echo $transaction_name; ?>"><br> 
    <label>transaction_type </label><br>
    <input type="text" name="transaction_type" value="<?php echo $transaction_type; ?>" class="input"><br> 
    <label>amounts </label><br>
    <input type="text" name="amounts" value="<?php echo $amounts; ?>" class="input"><br>  
    <label>transaction_date</label><br>
    <input type="text" name="transaction_date" value="<?php echo $transaction_date; ?>" class="input"><br>
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
















