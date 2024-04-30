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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS REPORT ABOUT TRANSACTION </h4>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="aqua">
                <tr>
                    <th>Transaction Id</th>
                    <th>User Id</th>
                    <th>Transaction Name</th>
                    <th>Transaction Type</th>
                    <th>Amounts</th>
                    <th>Transaction Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM transaction";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['transaction_id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['transaction_name']}</td> 
                        <td>{$row['transaction_type']}</td>
                        <td>{$row['amounts']}</td>
                        <td>{$row['transaction_date']}</td>
                        <td>
                            <a href='/Enterprise_management_system/edittransaction.php?transaction_id={$row['transaction_id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='/Enterprise_management_system/deletetransaction.php?transaction_id={$row['transaction_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
