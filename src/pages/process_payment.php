<?php
session_start();
include '../../config/database.php';

$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0;
if ($total_price <= 0) {
    $total_price = 50.00;
}
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$zip_code = isset($_POST['zip_code']) ? $_POST['zip_code'] : '';
$card_number=isset($_POST['card_number']) ? $_POST['card_number'] : '';


echo "User ID: $user_id<br>";
echo "Total Price: $total_price<br>";
echo "Payment Method: $payment_method<br>";

if ($user_id && $total_price > 0 && !empty($payment_method)) {
    $sql = 'INSERT INTO orders (user_id, total_price, payment_method,card_number ,cvv, address, zip_code) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idsssss", $user_id, $total_price, $payment_method,$card_number,$cvv, $address, $zip_code);

    if ($stmt->execute()) {
        // echo "Order added successfully";
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmation</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .confirmation-message {
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }
                .confirmation-message h2 {
                    color: #4CAF50;
                }
                .confirmation-message p {
                    color: #555;
                }
            </style>
        </head>
        <body>
            <div class="confirmation-message">
                <h2>تمت إضافة الطلب بنجاح!</h2>
                <p>شكرًا لك على الشراء. سيتم معالجة طلبك قريبًا.</p>
                <a href="../index.php" style="text-decoration: none; color: #4CAF50;">العودة إلى الصفحة الرئيسية</a>
            </div>
        </body>
        </html>';
        $userid=$_SESSION["userid"];
        $sqlDelete = "DELETE FROM `order_items` WHERE `user_id` = $userid";
        $conn->query($sqlDelete);

    } else {
        echo "Error: " . $stmt->error;
        
        
    }
    $stmt->close();
} else {
    echo "Invalid input"; 
}

$conn->close();
?>
