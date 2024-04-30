<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['user_id'])) {
        header("location:viewuser.php");
        exit;
    }
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id= ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $position = $row["position"];
        $gender = $row["gender"];
        $dob = $row["dob"];
        $phone = $row["phone"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
    } else {
        header("location:viewuser.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $position = $_POST["position"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
     $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($user_id) || empty($name) || empty($position) || empty($gender) || empty($dob) || empty($phone) || empty($email) || empty($username) || empty($password)) {
        echo "All fields are required";
    } else {
        $sql = "UPDATE user SET name=?, position=?, gender=?, dob=?, phone=?, email=?, username=?, password=? WHERE user_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssssssi", $name, $position, $gender, $dob, $phone, $email, $username, $password, $user_id);
        if ($stmt->execute()) {
            echo "updated successfully";
            header("location:viewuser.php");
            exit();
        } else {
            echo "Error updating record" . $connection->error;
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterprise Management system</title>
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
	<h3 style="color:green;">UPDATE USER HERE</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST">
	<label>User Id</label><br>
    <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
    <label>User Name</label><br>
    <input type="text" name="name" readonly class="input" value="<?php echo $name; ?>"><br>
    <label>Position</label><br>
    <input type="text" name="position" class="input" value="<?php echo $position; ?>"><br> 
    <label>gender</label><br>
    <input type="text" name="gender" value="<?php echo $gender; ?>" class="input"><br> 
    <label>dob </label><br>
    <input type="text" name="dob" readonly value="<?php echo $dob; ?>" class="input"><br>
    <label>phone</label><br>
    <input type="text" name="phone" class="input" value="<?php echo $phone; ?>"><br>  
    <label>email</label><br>
    <input type="text" name="email" value="<?php echo $email; ?>" class="input"><br>
    <label>username</label><br>
    <input type="text" name="username" value="<?php echo $username; ?>" class="input"><br>
    <label>password</label><br>
    <input type="text" name="password" value="<?php echo $password; ?>" class="input"><br>
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
















