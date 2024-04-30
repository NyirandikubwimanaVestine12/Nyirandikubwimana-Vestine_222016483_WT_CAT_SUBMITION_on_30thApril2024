
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/styles.css" title="style1" media="screen,tv,print,handheld"/>
    <title>Enterprise Management System</title>
    <script type="text/javascript">
        const colors=['skyblue','gray','skyblue','gray','skyblue'];
        let index=0;
        function changeBackgroundcolor(){
            document.body.style.backgroundColor=colors
            [index];
            index=(index+1)%colors.length;
        }
    //change background color every second
        setInterval(changeBackgroundcolor,1000);
    </script>
</head>
<!-- this is body of my project -->
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul>
                    <!-- Navigation links -->
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li class="dropdown"><!-- Dropdown menu --> <a href="#">Forms</a>
                        <div class="dropdown-content">
                            <a href="products.php">Product Form</a>
                            <a href="supply.php">Supplier Form</a>
                            <a href="order.php">Order Form</a>
                            <a href="transction.php">Transaction Form</a>
                            <a href="banks.php">Bank Form</a>    
                        </div>
                    </li>
                    <li class="dropdown"><!-- Dropdown menu --> <a href="#">Tables</a>
                        <div class="dropdown-content">
                            <a href="viewproduct.php">Product Table</a>
                            <a href="viewsupplier.php">Supplier Table</a>
                            <a href="vieworder.php">Order Table</a>
                            <a href="viewtransaction.php">Transaction Table</a>
                            <a href="viewbank.php">Bank Table</a>    
                        </div>
                    </li>
                    <li class="dropdown"><!-- Dropdown menu --> <a href="#">Setting</a>
                        <div class="dropdown-content">
                            <a href="register.html">Register</a>
                            <a href="viewuser.php">Edit User</a> 
                             <a href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
</body>
</html>
