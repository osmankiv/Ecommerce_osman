<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/customer_cart.css">
    <title>Customer Cart</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <!-- <li><a href="product_details.html">Products</a></li> -->
                <li><a href="" class="active">Cart</a></li>
                <li><a href="../pages/payment.html">Checkout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="cart-container">
            <h1>Your Shopping Cart</h1>
            <table id="cart-items">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                      session_start();
                    $host = "localhost";
                    $user_name = "root";
                    $password = "";
                    $database_name = "mollie";
                    $conn = new mysqli($host, $user_name, $password, $database_name);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    ////// prodect/////
                    function pro($id){

                        include"../../config/database.php";
                        
                    $stmt ="SELECT * FROM `products` WHERE `id`= '$id'";
                    $result=$conn->query($stmt);
                    $totalPrice = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['products_name']}</td>
                                    <td>" . number_format($row['products_price'], 2) . "$</td>
                                    <td>
                                        <form method='POST' action='customer_cart.php?id={$row['id']} ' style='display:inline;'>
                                            <input type='hidden' name='remove_id' value='{$row['id']}'>
                                            <button type='submit' class='remove'>Remove</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    }
                    
                    }

                    $userid=$_SESSION["userid"];
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_id'])) {
                        $d_id=$_GET['id'];
                       
                        $sqlDelete = "DELETE FROM `order_items` WHERE `product_id` = $d_id";
                        if($conn->query($sqlDelete)){
                           
                        }
                        else{
                            echo $conn->error;
                        }
                    }
                
                   $userid=$_SESSION["userid"];
                    $stmt ="SELECT * FROM `order_items` WHERE `user_id`= '$userid'";
                    $result=$conn->query($stmt);
                    $totalPrice = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $total = $row['price'];
                            $totalPrice += $total;
                            $pr_id=$row['product_id'];
                            pro($pr_id);
                        }
                    }
                     else {
                        echo "<tr><td colspan='5'>No items in cart</td></tr>";
                    }
                    

                    $conn->close();
                    ?>
                </tbody >
            </table>
            <div class="cart-summary">
                <p id="total-price">Total: <?php echo number_format($totalPrice, 2); ?>$</p>
                <a href="payment.html" class="checkout-button">Proceed To Checkout</a>
            </div>
        </div>
    </main>
    

    <footer>&copy; 2024 mollie. All rights reserved.</footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
