<?php
include("connection.php");

if (isset($_POST["Submit"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql = "SELECT cust_password FROM cust_login WHERE username = '$username'";
    $sql1 = "SELECT username FROM cust_login WHERE cust_password = '$password'";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);


    if ($result1->num_rows>0) {

        if ($result->num_rows>0){
        
            header("Location: main2.php");
            exit();
        } else {
            echo '<script>
            window.location.href = "register.php";
            alert("Login Failed. Invalid username!");
            </script>';
        }
    }else {
        echo '<script>
            window.location.href = "register.php";
            alert("Login Failed. Invalid password!");
            </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Services</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Mess Services</h1>
        <nav>
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
               
            </ul>
        </nav>
    </header>
    <div id="form">
    <h1>Login</h1><br>
    <section class="main">
        <form action="login.php" method="post">
            <label>Username:</label>
            <input name="user" type="text" required id="user"><br><br>
            <label>Password : </label>
            <input name="pass" type="password" id="pass"><br><br>
            <input type="submit" required id="btn" value="Login" name="Submit">
        </form><br>
        <a href="register.php">Sign Up </a>
    </section>
    
    <footer>
        <p>&copy; 2023 Mess Services</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>
