<?php
include '../../config/database.php';

$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0.00;
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

echo "User ID: $user_id<br>";
echo "Total Price: $total_price<br>";
echo "Payment Method: $payment_method<br>";

if ($user_id && $total_price > 0 && !empty($payment_method)) {
    $sql = 'INSERT INTO orders (user_id, total_price, payment_method) VALUES (?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ids", $user_id, $total_price, $payment_method);

    if ($stmt->execute()) {
        echo "Order added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid input";
}

$conn->close();
?>
