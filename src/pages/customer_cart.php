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
                <li><a href="../indexx.php">Home</a></li>
                <li><a href="product_details.html">Products</a></li>
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
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $host = "localhost";
                    $user_name = "root";
                    $password = "";
                    $database_name = "mollie";
                    $conn = new mysqli($host, $user_name, $password, $database_name);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $userId = 1;
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_id'])) {
                        $removeId = intval($_POST['remove_id']);
                        $sqlDelete = "DELETE FROM order_items WHERE product_id = $removeId AND order_id IN (SELECT id FROM orders WHERE user_id = $userId)";
                        $conn->query($sqlDelete);
                    }
                
                    $sql = "SELECT p.id AS product_id, p.products_name, p.products_price, oi.quantity 
                            FROM order_items oi 
                            JOIN products p ON oi.product_id = p.id 
                            JOIN orders o ON oi.order_id = o.id 
                            WHERE o.user_id = $userId";

                    $result = $conn->query($sql);
                    $totalPrice = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $total = $row['products_price'] * $row['quantity'];
                            $totalPrice += $total;
                            echo "<tr>
                                    <td>{$row['products_name']}</td>
                                    <td>" . number_format($row['products_price'], 2) . "$</td>
                                    <td>{$row['quantity']}</td>
                                    <td>" . number_format($total, 2) . "$</td>
                                    <td>
                                        <form method='POST' style='display:inline;'>
                                            <input type='hidden' name='remove_id' value='{$row['product_id']}'>
                                            <button type='submit' class='remove'>Remove</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No items in cart</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
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
