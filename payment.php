<?php
include("connection.php");

if (isset($_POST["Submit"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    // Query to get the password for the provided username
    $sql = "SELECT cust_password FROM cust_login WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dbPassword = $row["cust_password"];
            if ($password == $dbPassword) {
                // Query to get the total amount for the provided username
                $sql2 = "SELECT total_amount FROM orders WHERE username = '$username'";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    if (mysqli_num_rows($result2) > 0) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $totalAmount = $row2["total_amount"];

                        // Query to get the wallet balance for the provided username
                        $sql3 = "SELECT cust_wallet FROM customer WHERE cust_username = '$username'";
                        $result3 = mysqli_query($conn, $sql3);

                        if ($result3) {
                            if (mysqli_num_rows($result3) > 0) {
                                $row3 = mysqli_fetch_assoc($result3);
                                $walletBalance = $row3["cust_wallet"];
                                $balanceLeft = $walletBalance - $totalAmount;

                                // Update the wallet balance
                                $sqlUpdate = "UPDATE customer SET cust_wallet = '$balanceLeft' WHERE cust_username = '$username'";
                                $result4 = mysqli_query($conn, $sqlUpdate);

                                if ($result4) {
                                    $sqldelete = "DELETE FROM orders WHERE username='$username'";
                                    $result5 = mysqli_query($conn, $sqldelete);
                                    echo "Payment Successful! Remaining Balance is Rs." . $balanceLeft;
                                                               
                                } else {
                                    echo "Wallet update failed!";
                                }
                            } else {
                                echo "Invalid username!";
                            }
                        } else {
                            echo "Error in fetching wallet balance!";
                        }
                    } else {
                        echo "No orders found for the provided username!";
                    }
                } else {
                    echo "Error in fetching total amount!";
                }
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "Invalid username!";
        }
    } else {
        echo "Error in querying the database!";
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
    <h1>Pay From Wallet</h1><br>
    <section class="main">
        <form action="payment.php" method="post">

            <label>Username :</label>
            <input name="user" type="text" required id="user"><br><br>

            <label>Password : </label>
            <input name="pass" type="password" id="pass"><br><br>

            <input type="submit" required id="btn" value="Pay Now!" name="Submit">

        </form><br>
        
    </section>
    
    <footer>
        <p>&copy; 2023 Mess Services</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>