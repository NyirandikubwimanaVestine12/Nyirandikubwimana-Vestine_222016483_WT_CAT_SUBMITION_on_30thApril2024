<?php 
//call the file that contain database connection
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["bank_id"])) {
   header("location:viewbank.php");
   exit;
  }
  $bank_id = $_GET["bank_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM bank WHERE bank_id=$bank_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id=$row['user_id'];
        $bank_account = $row["bank_account"];
        $bank_name = $row["bank_name"];
        $transaction_name=$row['transaction_name'];
        $amounts = $row["amounts"];
        $Update_date = $row["Update_date"];
    } else {
        header("location: /Enterprise_management_system/viewtransaction.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bank_id = $_POST["bank_id"];
    $user_id= $_POST['user_id'];
    $bank_account = $_POST["bank_account"];
    $bank_name = $_POST["bank_name"];
    $transaction_name =$_POST['transaction_name'];
    $amounts = $_POST["amounts"];
    $Update_date=$_POST['Update_date'];
    if (empty($bank_id) || empty($user_id) || empty($bank_account) || empty($bank_name) || empty($amounts) || empty($Update_date)) {
        echo "All feild are required!";
    }else {
        $sql = "UPDATE bank SET user_id='$user_id', bank_account='$bank_account', bank_name='$bank_name', transaction_name='$transaction_name', amounts='$amounts',Update_date='$Update_date' WHERE bank_id='$bank_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:/Enterprise_management_system/viewbank.php");
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
	<h3 style="color:green;">UPDATE BANK HERE</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST" onsubmit="return confirmUpdate();">
	<label>Bank Id</label><br>
    <input type="text" name="bank_id" readonly class="input" value="<?php echo $bank_id; ?>"><br>
    <label>User Id</label><br>
    <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
    <label>bank_account</label><br>
    <input type="text" name="bank_account" class="input" value="<?php echo $bank_account; ?>"><br> 
    <label>bank_name </label><br>
    <input type="text" name="bank_name" value="<?php echo $bank_name; ?>" class="input"><br>
    <label>transaction_name </label><br>
    <input type="text" name="transaction_name" value="<?php echo $transaction_name; ?>" class="input"><br>  
    <label>amounts </label><br>
    <input type="text" name="amounts" value="<?php echo $amounts; ?>" class="input"><br>  
    <label>Update_date</label><br>
    <input type="text" name="Update_date" value="<?php echo $Update_date; ?>" class="input"><br>
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
















