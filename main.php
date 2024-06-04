<?php
    include ("connection.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Services</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Basic styles to enhance the appearance */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        .hero {
            background-image: url('background.jpeg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .hero h2 {
            font-size: 36px;
            margin: 20px 0;
        }

        .hero p {
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #009688;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
        }

        .apply {
            background-color: #f9f9f9;
            padding: 40px 0;
            text-align: center;
        }

        .option {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px;
            display: inline-block;
        }

        .option h3 {
            font-size: 24px;
            margin: 10px 0;
        }

        .option p {
            font-size: 18px;
            margin: 10px 0;
        }

        .apply-button {
            background-color: #009688;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header style="background-color: #009688; color: #fff; text-align: center; padding: 20px 0;">
    <h1 style="font-family: 'Roboto', sans-serif; font-size: 32px; text-transform: uppercase; margin: 0;">Mess Services</h1>
    <nav>
        <img src="menu.jpeg">
        <ul style="list-style: none; padding: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="main.php" style="text-decoration: none; color: #fff; font-size: 18px;">Home</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="menu2.php" style="text-decoration: none; color: #fff; font-size: 18px;">Menu</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="about.php" style="text-decoration: none; color: #fff; font-size: 18px;">About</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="contact.php" style="text-decoration: none; color: #fff; font-size: 18px;">Contact</a></li>
            <a href="login.php"><button class="login">Login/Signup</button></a>
        </ul>
    </nav>
</header>

    <section class="hero">
        <h2>Welcome to Our Mess Services</h2>
        <p>Delicious and healthy meal plans prepared just for you.</p><br>
        <a href="menu.php" class="btn">Explore Menu</a>
        
    </section>

    <section class="apply" id="apply">
        <h2>Subscription Options</h2>
        <div class="options">
            <div class="option">
                <h3>Three Months</h3>
                <p>Price: 2500rs</p>
                <button class="apply-button">Apply</button>
            </div>
            <div class="option">
                <h3>Two Months</h3>
                <p>Price: 2000rs</p>
                <button class="apply-button">Apply</button>
            </div>
        </div>
    </section>

</body>
</html>