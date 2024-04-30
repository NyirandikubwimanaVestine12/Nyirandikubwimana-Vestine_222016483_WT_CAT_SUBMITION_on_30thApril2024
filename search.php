<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise Management System</title>
    <style>
        body {
            background-color: skyblue;
            font-family: Arial, sans-serif;
            margin-top: 50px;

        }
        h1 {
            font-weight: bold;
        }
        p {
            font-family: monospace;
            color: darkblue;
            font-size: 35px;
            text-align: center;
            margin-top: -70px;
            margin-left: 9px;
        }
        th {
            font-weight: bold;
            font-size: 20px;
            color: darkblue;
        }
        td {
            font-family: serif;
            font-weight: bold;
            font-size: 18px;
            color: darkblue;
        }
        td a {
            text-decoration: none;
        }
        td a:hover {
            background-color: red;
            padding: 6px;
        }
    </style>
</head>
<body>
    <div>
        <img src="./images/hm1.jpg" style="width:50px; height: 40px; border-radius: 20px;">
        <p>
            <a href="home.php" style="background-color: blue; color: white; border-color: black; width: 150px; text-decoration: none; border-radius: 6px; font-weight: bold; height: 40px; font-size: 22px; padding: 8px;">BACK TO HOME</a>
            &nbsp;&nbsp; WELCOME TO ENTERPRISE MANAGEMENT SYSTEM
        </p>
    </div>
    <div class="retriv">
        <?php
        // calling file that contains database connection
        include "dbconnection.php";
        $searchkey = "";
        // Define $searchkey initially
        if (isset($_POST['search'])) {
            $searchkey = $_POST['search'];
            $sql = "SELECT * FROM user WHERE user_id ='$searchkey'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Display table if records are found
        ?>
        <h1>Information matched to the ID you searched</h1>
        <table border="2">
            <tr bgcolor="white">
                <th>User Id</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php
                while ($row = $result->fetch_object()) {
            ?>
            <tr>
                <td><?php echo $row->user_id ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->position ?></td>
                <td><?php echo $row->gender ?></td>
                <td><?php echo $row->dob ?></td>
                <td><?php echo $row->phone ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->username ?></td>
                <td><?php echo $row->password ?></td>
            </tr>
            <?php
                }
            } else {
                echo "<b>No records found with the given ID.</b>";
            }
        } else {
            echo "<b>Please enter a search key.</b>";
        }
        ?>
        </table><br>
        <img src="./images/hm.jpg" style="width:400px; height: 300px; border-radius: 50px;">
        <img src="./images/ac.png" style="width:400px; height: 300px; border-radius: 50px;">
        <br>
        <a href="viewuser.php" style="font-family: serif; font-size: 20px; text-decoration: none;">View More</a><br>
    </div>
</body>
</html>
