<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">ENTERPRISE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS REPORT OF ORDERS </h4>
        <a href="order.php" class="btn btn-primary" style="margin-top: 0px;">Order Again</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="aqua">
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Payment methods</th>
                    <th>Phone</th>
                    <th>Order Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM customerorders";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['product_id']}</td> 
                        <td>{$row['quantity']}</td>
                        <td>{$row['paymentmethods']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['order_date']}</td>
                        <td>
                            <a href='/Enterprise_management_system/editorder.php?order_id={$row['order_id']}' class='btn btn-info'><i class='fas fa-edit'></i></a>
                            <td>
                             <a href='/Enterprise_management_system/deleteorder.php?order_id={$row['order_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
