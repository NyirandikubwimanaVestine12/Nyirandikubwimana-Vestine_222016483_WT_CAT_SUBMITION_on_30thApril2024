<?php
include "menutop.php";
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];
	$sql="INSERT INTO messages(names,email,phone,message) VALUES('$name','$email','$phone','$message')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Your Message Sent Successfully";
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
	<title>enterprise management system</title>
	<style>
		label{
			color: blue;
			padding: 10px;
		}
		.type{
			width: 300px;
			height: 30px;
			border-radius: 12px;
			border-color: gray;
		}
		textarea{
			width: 300px;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<center>
	<p ><h2  style="color: darkblue;">WELCOME TO ENTERPRISE MANAGEMENT SYSTEM</h2>
		<h4 style="color: green;">THIS IS CONTACT US PAGE</h4>
                <p>Email:enterprisemanagementsystem@yahoo.com</p>
                <p>Phone: +250788885237</p>
                <p>Address: 1555,muhanga, Rwanda</p>
    <p style="color:blue;">Any Issues and help Contact us on:<p>
    <p>Email:nyirandikubwimanavestine@gmail.com</p>
    <p>Phone:+250788800625</p>
    <p>Address:st1555,muhanga,Rwanda</p>
		<p>if you wants to know more information about our system,<br> you may contact us or visit our channel and other social media that are the<br> following bellow,
		and also you may  complete this form inorder to share your ideas</p>
		<form  method="POST">
  <label for="name">Names:</label><br>
  <input type="text" id="name" name="name" class="type" required><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" class="type" required><br>

  <label for="phone">Telephone:</label><br>
  <input type="tel" id="phone" name="phone" class="type"><br>

  <label for="message">Message:</label><br>
  <textarea id="message" name="message" rows="4"  required></textarea><br>

  <input type="submit" value="SEND" style="background-color: blue; color: white; font-family: times new roman; font-weight: bold; font-size: 18px; height: 45px; border: none; border-radius: 8px; width: 130px; padding: 10px;">
</form>	
</center>
<div style="color: black;font-size: 25px;"><p>Connect with us on social media or social networkings:

  <a href="https://www.twitter.com/pdas" style="color: black;font-size: 15px;background-color: violet; padding: 10px; text-decoration: none;">TWITTER</a>
  <a href="https://www.facebook.com/pdas" style="color: black;font-size: 15px;background-color: violet;  padding: 10px; text-decoration: none;">FACEBOOK</a>
  <a href="https://www.instagram.com/pdas" style="color: black;font-size: 15px;background-color: violet;  padding: 10px; text-decoration: none;">INSTAGRAM</a>
  <a href="https://www.linkedin.com/pdas" style="color: black;font-size: 15px;background-color: violet;  padding: 10px; text-decoration: none;">LINKEDIN</a>
</p></div>
<footer>
			<!-- Footer section -->
	<marquee><p style="color:blue;">&copy copy right 2024&reg Vestine_222016483_CBE_BIT_Year2_Group_Two. </p></marquee>
		</footer>
</body>
</html>