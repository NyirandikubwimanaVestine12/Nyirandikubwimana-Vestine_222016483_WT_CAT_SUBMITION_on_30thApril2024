<?php
if (isset($_GET["bank_id"])) {
   $bank_id=$_GET["bank_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM bank WHERE bank_id=$bank_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewbank.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>