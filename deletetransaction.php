<?php
if (isset($_GET["transaction_id"])) {
   $transaction_id=$_GET["transaction_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM transaction WHERE transaction_id=$transaction_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewtransaction.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>