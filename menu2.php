<?php
    include("connection.php");
    
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $dosa = $_POST["Dosa"];
        $burger = $_POST["Burger"];
        $idli = $_POST["Idli"];
        $samosa = $_POST["Samosa"];
        $rice = $_POST["Rice"];
        $username = $_POST["username"];
    }

         
            $totalAmount = 0;
            
            $dosatotal=$dosa*50;
            $burgertotal=$burger*50;
            $idlitotal=$idli*20;
            $samosatotal=$dosa*30;
            $ricetotal=$dosa*70;
            
            $total_qty=$dosa+$burger+$idli+$samosa+$rice;
            $totalamount=$dosatotal+$burgertotal+$idlitotal+$samosatotal+$ricetotal;
            

            $sql1 = "INSERT INTO orders (items, total_amount, username) VALUES ('$total_qty', '$totalamount', '$username')";
    

           
        if (mysqli_query($conn, $sql1)) {
            
            echo "<br>Items Added to the cart!<br>";
            // header("Location : payment.php")  ;
            // exit;          
        } else {
            echo "Items not Added<br>";
        }

        // if (mysqli_query($conn, $sql2)) {
        //     echo "Login registration successful:<br>";
        //     header("Location: https://localhost/kas/main2.php");
            
        // } else {
        //     echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mess Services - Explore our menu">
    <title>Mess Services - Menu</title>
    <link rel="stylesheet" href="menu.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #009688;
            color: white;
            text-align: center;
            padding: 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            display: inline;
        }

        main {
            margin: 20px;
        }

        .main {
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #4caf50;
        }
        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .food-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
        }

        .food-item .food-details {
            flex: 1;
            text-align: left;
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


<main>
        <section class="main">
            <form action="menu2.php" method="post">
                <div class="food-item">
                    <img src="dosa.jpeg" alt="Dosa">
                    <div class="food-details">
                        <label for="Dosa">Dosa</label>
                        <input id="Dosa" name="Dosa" type="number" required>
                    </div>
                </div>
                
                <div class="food-item">
                    <img src="burger.jpeg" alt="Burger">
                    <div class="food-details">
                        <label for="Burger">Burger</label>
                        <input id="Burger" name="Burger" type="number" required>
                    </div>
                </div>
                
                <div class="food-item">
                    <img src="idli.jpeg" alt="Idli Sambhar">
                    <div class="food-details">
                        <label for="Idli">Idli Sambhar</label>
                        <input id="Idli" name="Idli" type="number" required>
                    </div>
                </div>
                
                <div class="food-item">
                    <img src="samosa.jpeg" alt="Samosa">
                    <div class="food-details">
                        <label for="Samosa">Samosa</label>
                        <input id="Samosa" name="Samosa" type="number" required>
                    </div>
                </div>
                
                <div class="food-item">
                    <img src="rice.jpeg" alt="Rice">
                    <div class="food-details">
                        <label for="Rice">Rice</label>
                        <input id="Rice" name="Rice" type="number">
                    </div>
                </div>
                
                <label for="username">Enter your username</label>
                <input id="username" name="username" type="text" required>
                
                <input type="submit" value="Checkout"><br>
                <a href="payment.php">Proceed to Payment!</a>
            </form>
        </section>
    </main>

</body>
</html>