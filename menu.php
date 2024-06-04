<?php
include("connection.php");
session_start();

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
} else {
    $cart = [];
}

if (isset($_POST["checkout"])) {
    $totalAmount = 0;
    foreach ($cart as $cartItem) {
        $item = $cartItem["item"];
        $quantity = $cartItem["quantity"];
        $price = $cartItem["price"];
        $totalAmount += $q<?php
        include("connection.php");
        session_start();
        
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        } else {
            $cart = [];
        }
        
        if (isset($_POST["checkout"])) {
            $totalAmount = 0;
            foreach ($cart as $cartItem) {
                $item = $cartItem["item"];
                $quantity = $cartItem["quantity"];
                $price = $cartItem["price"];
                $totalAmount += $quantity * $price;
            }
        
            // Convert cart items to JSON
            $itemsJson = json_encode($cart);
        
            // Insert the order into the database
            $insertSQL = "INSERT INTO orders (items, total_amount) VALUES (?, ?)";
            $stmt = $conn->prepare($insertSQL);
            $stmt->bind_param("sd", $itemsJson, $totalAmount); // Use "s" for string and "d" for double
        
            if ($stmt->execute()) {
                echo "Order successfully inserted into the database";
            } else {
                echo "Order not inserted!";
            }
        
            // Clear the cart after checkout
            $_SESSION["cart"] = [];
        }
        
        // Close the database connection (if not using a persistent connection)
        $conn->close();
        ?>
        
        
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Mess Services - Explore our menu">
            <title>Mess Services - Menu</title>
            <link rel="stylesheet" href="menu.css">
        </head>
        <body>
            <header>
                <h1>Mess Services</h1>
                <nav>
                    <ul>
                        <li><a href="main2.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Contact</a></li>
                        
                    </ul>
                </nav>
            </header>
            
            <main>
                <h1 class="menu-title">MENU</h1>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Dosa</h3>
                        <span class="menu-price">RS.50</span>
                    </div>
                    <div class="quantity-input">
                        <label for="dosa-quantity">Quantity:</label>
                        <input type="number" id="dosa-quantity" name="dosa-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="Dosa" data-price="50">Add to Cart</button>
                    </div>
                </section>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Burger</h3>
                        <span class="menu-price">RS.50</span>
                    </div>
                    <div class="quantity-input">
                        <label for="burger-quantity">Quantity:</label>
                        <input type="number" id="burger-quantity" name="burger-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="Burger" data-price="50">Add to Cart</button>
                    </div>
                </section>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Samosa</h3>
                        <span class="menu-price">RS.20</span>
                    </div>
                    <div class="quantity-input">
                        <label for="samosa-quantity">Quantity:</label>
                        <input type="number" id="samosa-quantity" name="samosa-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="samosa" data-price="20">Add to Cart</button>
                    </div>
                </section>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Pasta</h3>
                        <span class="menu-price">RS.80</span>
                    </div>
                    <div class="quantity-input">
                        <label for="pasta-quantity">Quantity:</label>
                        <input type="number" id="pasta-quantity" name="pasta-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="Pasta" data-price="80">Add to Cart</button>
                    </div>
                </section>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Rice</h3>
                        <span class="menu-price">RS.30</span>
                    </div>
                    <div class="quantity-input">
                        <label for="rice-quantity">Quantity:</label>
                        <input type="number" id="rice-quantity" name="rice-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="Rice" data-price="30">Add to Cart</button>
                    </div>
                </section>
                <section class="menu-item">
                    <div class="menu-details">
                        <h3>Soup</h3>
                        <span class="menu-price">RS.70</span>
                    </div>
                    <div class="quantity-input">
                        <label for="soup-quantity">Quantity:</label>
                        <input type="number" id="soup-quantity" name="soup-quantity" value="0" min="0">
                    </div>
                    <div class="add-to-cart">
                        <button class="add-button" data-item="Soup" data-price="70">Add to Cart</button>
                    </div>
                </section>
                <!-- Add similar sections for other menu items -->
            </main>
            
        <div id="cart">
            <h2>Your Cart</h2>
            <ul id="cart-items" class="cart-list"></ul>
            <button id="checkout" href="cart.php">Checkout</button>
        </div>
        
        <script>
        const addButtonList = document.querySelectorAll(".add-button");
        const cartItems = document.getElementById("cart-items");
        const total = document.getElementById("total");
        const checkoutButton = document.getElementById("checkout");
        let cart = [];
        
        addButtonList.forEach((button) => {
            button.addEventListener("click", function () {
                const item = button.getAttribute("data-item");
                const price = parseFloat(button.getAttribute("data-price"));
                const quantityInput = button.parentElement.parentElement.querySelector(".quantity-input input");
                const quantity = parseInt(quantityInput.value);
        
                if (quantity > 0) {
                    const existingCartItem = cart.find((cartItem) => cartItem.item === item);
                    if (existingCartItem) {
                        existingCartItem.quantity += quantity;
                        existingCartItem.total = existingCartItem.quantity * price;
                    } else {
                        cart.push({ item, price, quantity, total: price * quantity });
                    }
        
                    updateCartDisplay();
                }
            });
        });
        
        
        function updateCartDisplay() {
            cartItems.innerHTML = "";
            let cartTotal = 0;
        
            cart.forEach((cartItem) => {
                const cartItemElement = document.createElement("li");
                cartItemElement.textContent = `${cartItem.item} - Qty: ${cartItem.quantity} - Price: RS.${cartItem.price * cartItem.quantity} - Total: RS.${cartItem.total}`;
                cartItems.appendChild(cartItemElement);
        
                cartTotal += cartItem.total;
            });
        
        }
        
        
        
        checkoutButton.addEventListener("click", function () {
            window.location.href = "payment.php";
        });
        
        </script>
        
            <footer>
                <p>&copy; 2023 Mess Services</p>
            </footer>
        </body>
        </html>uantity * $price;
    }

    // Convert cart items to JSON
    $itemsJson = json_encode($cart);

    // Insert the order into the database
    $insertSQL = "INSERT INTO orders (items, total_amount) VALUES (?, ?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sd", $itemsJson, $totalAmount); // Use "s" for string and "d" for double

    if ($stmt->execute()) {
        echo "Order successfully inserted into the database";
    } else {
        echo "Order not inserted!";
    }

    // Clear the cart after checkout
    $_SESSION["cart"] = [];
}

// Close the database connection (if not using a persistent connection)
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mess Services - Explore our menu">
    <title>Mess Services - Menu</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <h1>Mess Services</h1>
        <nav>
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Contact</a></li>
                
            </ul>
        </nav>
    </header>
    
    <main>
        <h1 class="menu-title">MENU</h1>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Dosa</h3>
                <span class="menu-price">RS.50</span>
            </div>
            <div class="quantity-input">
                <label for="dosa-quantity">Quantity:</label>
                <input type="number" id="dosa-quantity" name="dosa-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="Dosa" data-price="50">Add to Cart</button>
            </div>
        </section>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Burger</h3>
                <span class="menu-price">RS.50</span>
            </div>
            <div class="quantity-input">
                <label for="burger-quantity">Quantity:</label>
                <input type="number" id="burger-quantity" name="burger-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="Burger" data-price="50">Add to Cart</button>
            </div>
        </section>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Samosa</h3>
                <span class="menu-price">RS.20</span>
            </div>
            <div class="quantity-input">
                <label for="samosa-quantity">Quantity:</label>
                <input type="number" id="samosa-quantity" name="samosa-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="samosa" data-price="20">Add to Cart</button>
            </div>
        </section>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Pasta</h3>
                <span class="menu-price">RS.80</span>
            </div>
            <div class="quantity-input">
                <label for="pasta-quantity">Quantity:</label>
                <input type="number" id="pasta-quantity" name="pasta-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="Pasta" data-price="80">Add to Cart</button>
            </div>
        </section>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Rice</h3>
                <span class="menu-price">RS.30</span>
            </div>
            <div class="quantity-input">
                <label for="rice-quantity">Quantity:</label>
                <input type="number" id="rice-quantity" name="rice-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="Rice" data-price="30">Add to Cart</button>
            </div>
        </section>
        <section class="menu-item">
            <div class="menu-details">
                <h3>Soup</h3>
                <span class="menu-price">RS.70</span>
            </div>
            <div class="quantity-input">
                <label for="soup-quantity">Quantity:</label>
                <input type="number" id="soup-quantity" name="soup-quantity" value="0" min="0">
            </div>
            <div class="add-to-cart">
                <button class="add-button" data-item="Soup" data-price="70">Add to Cart</button>
            </div>
        </section>
        <!-- Add similar sections for other menu items -->
    </main>
    
<div id="cart">
    <h2>Your Cart</h2>
    <ul id="cart-items" class="cart-list"></ul>
    <button id="checkout" href="cart.php">Checkout</button>
</div>

<script>
const addButtonList = document.querySelectorAll(".add-button");
const cartItems = document.getElementById("cart-items");
const total = document.getElementById("total");
const checkoutButton = document.getElementById("checkout");
let cart = [];

addButtonList.forEach((button) => {
    button.addEventListener("click", function () {
        const item = button.getAttribute("data-item");
        const price = parseFloat(button.getAttribute("data-price"));
        const quantityInput = button.parentElement.parentElement.querySelector(".quantity-input input");
        const quantity = parseInt(quantityInput.value);

        if (quantity > 0) {
            const existingCartItem = cart.find((cartItem) => cartItem.item === item);
            if (existingCartItem) {
                existingCartItem.quantity += quantity;
                existingCartItem.total = existingCartItem.quantity * price;
            } else {
                cart.push({ item, price, quantity, total: price * quantity });
            }

            updateCartDisplay();
        }
    });
});


function updateCartDisplay() {
    cartItems.innerHTML = "";
    let cartTotal = 0;

    cart.forEach((cartItem) => {
        const cartItemElement = document.createElement("li");
        cartItemElement.textContent = `${cartItem.item} - Qty: ${cartItem.quantity} - Price: RS.${cartItem.price * cartItem.quantity} - Total: RS.${cartItem.total}`;
        cartItems.appendChild(cartItemElement);

        cartTotal += cartItem.total;
    });

}



checkoutButton.addEventListener("click", function () {
    window.location.href = "payment.php";
});

</script>

    <footer>
        <p>&copy; 2023 Mess Services</p>
    </footer>
</body>
</html>