<?php  
$servername="localhost";
$username="222016483vestine";
$password="Vestine@222016483";
$databasename="enterprisemanagementsystem";
$connection=new mysqli($servername,$username,$password,$databasename);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}
?>