<?php
    include("connection.php");
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $username = $_POST["username"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone = $_POST["phone"];

        $sql1 = "INSERT INTO customer (cust_name, cust_email, cust_password, cust_contact, cust_username) VALUES ('$name', '$email', '$password', '$phone', '$username')";
        $sql2 = "INSERT INTO cust_login values ('$username', '$password')";
    

           
        if (mysqli_query($conn, $sql1)) {
            
            echo "<br> " . $name . "<br>";
            
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }

        if (mysqli_query($conn, $sql2)) {
            echo "Login registration successful:<br>";
            header("Location: https://localhost/kas/main2.php");
            
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Services Registration</title>
    <link rel="stylesheet" href="menu.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #009688;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 32px;
            text-transform: uppercase;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        section.main {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        a {
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        footer {
        text-align: center;
        padding: 20px 0;
        background-color: #009688;
        color: #fff;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
    </style>
</head>
<body>
<header style="background-color: #009688; color: #fff; text-align: center; padding: 20px 0;">
    <h1 style="font-family: 'Roboto', sans-serif; font-size: 32px; text-transform: uppercase; margin: 0;">Mess Services</h1>
    <nav>
        <ul style="list-style: none; padding: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="main.php" style="text-decoration: none; color: #fff; font-size: 18px;">Home</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="menu.php" style="text-decoration: none; color: #fff; font-size: 18px;">Menu</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="about.php" style="text-decoration: none; color: #fff; font-size: 18px;">About</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="contact.php" style="text-decoration: none; color: #fff; font-size: 18px;">Contact</a></li>
        </ul>
    </nav>
</header>
    <section class="main">
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input name="name" type="text" required>
            <label for="email">Email:</label>
            <input name="email" type="email" required>
            <label for="password">Password:</label>
            <input name="password" type="password" required>
            <label for="phone">Phone No.:</label>
            <input name="phone" type="tel">
            <button type="submit">Register</button>
        </form>
        <a href="login.php">Already have an account?</a>
    </section>
    <footer>
        <p>&copy; 2023 Mess Services</p>
    </footer>
</body>
</html>