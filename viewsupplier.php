<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">ENTERPRISE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL SUPPLIERS </h4>
        <a href="supply.php" class="btn btn-primary" style="margin-top: 0px;">New Supplier</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>Supplier Id</th>
                    <th>Product Id</th>
                    <th>Supplier Name</th>
                    <th>Phone number</th>
                    <th>Price of Product</th>
                    <th>Email</th>
                    <th>Supply Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM Supplier";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['supply_id']}</td>
                        <td>{$row['product_id']}</td> 
                        <td>{$row['supplyname']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['supply_date']}</td>
                        <td>
                            <a href='/Enterprise_management_system/editsupply.php?supply_id={$row['supply_id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='/Enterprise_management_system/deletesupply.php?supply_id={$row['supply_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
