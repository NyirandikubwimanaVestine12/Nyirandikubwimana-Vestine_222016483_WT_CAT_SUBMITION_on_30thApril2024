<?php
if (isset($_GET["supply_id"])) {
   $supply_id=$_GET["supply_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM supplier WHERE supply_id=$supply_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewsupplier.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>