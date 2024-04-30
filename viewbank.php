<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise Management System</title>
    </script>
    <!-- Bootstrap CSS for table styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--  call the function that help in Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for styling */
        body {
            font-family: "Century Gothic", sans-serif;
        }
        .heading {
            text-align: center;
            font-weight: bold;
            color: green;
        }
        .subheading {
            text-align: center;
            font-weight: bold;
            color: blue;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        /* Optional: style the table header */
        th {
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="heading">ENTERPRISE MANAGEMENT SYSTEM</h2>
        <h4 class="subheading">THIS TABLE SHOWS REPORT ABOUT BANK TRANSACTIONS</h4>
        <div class="btn-container">
            <a href="banks.php" class="btn btn-primary">New Transaction</a>
            <a href="home.php" class="btn btn-secondary">Back Home</a>
        </div>
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bank Id</th>
                        <th>User Id</th>
                        <th>Bank Account</th>
                        <th>Bank Name</th>
                        <th>Transaction Name</th>
                        <th>Amounts</th>
                        <th>Updated Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Include database connection
                    include "dbconnection.php";
                    $sql = "SELECT * FROM bank";
                    $result = $connection->query($sql);
                    if (!$result) {
                        echo "Invalid query!!" . $connection->error;
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['bank_id']}</td>
                            <td>{$row['user_id']}</td>
                            <td>{$row['bank_account']}</td> 
                            <td>{$row['bank_name']}</td>
                            <td>{$row['transaction_name']}</td>
                            <td>{$row['amounts']}</td>
                            <td>{$row['Update_date']}</td>
                            <td>
                                <a href='/Enterprise_management_system/editbank.php?bank_id={$row['bank_id']}' class='btn btn-info'><i class='fas fa-edit'></i></a>
                            </td>
                            <td>
                                <a href='/Enterprise_management_system/deletebank.php?bank_id={$row['bank_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
