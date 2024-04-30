<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .inputf{
            width: 400px;
            height: 50px;
            border-radius: 12px;
            border-color: blue;
        }
        .btnf{
            width: 90px;
            height: 50px;
            border-radius: 12px;
            background-color: blue;
            color: white;
            font-family: century;
            font-weight: bold;
            font-size: 24px;
            border-color: magenta;
        }
        .btnf:hover{
            background-color: white;
            color: blue;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">ENTERPRISE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue; margin-left:500px;">LIST OF USERS IN OUR ENTERPRISE</h4>
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Enter user_id to searching information " class="inputf">
        <input type="submit" name="submit" value="Search" class="btnf">
    </form>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Position</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Phone</th>
                     <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "dbconnection.php";
                $sql = "SELECT * FROM user";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['user_id']}</td>
                        <td>{$row['name']}</td> 
                        <td>{$row['position']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['phone']}</td>
                         <td>{$row['email']}</td>
                          <td>{$row['username']}</td>
                           <td>{$row['password']}</td>
                        <td>
                        <a href='/Enterprise_management_system/edituser.php?user_id={$row['user_id']}' class='btn btn-primary btn-sm'>Update</a>
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
