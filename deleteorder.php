<?php
if (isset($_GET["order_id"])) {
   $order_id=$_GET["order_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM customerorders WHERE order_id=$order_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:vieworder.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>