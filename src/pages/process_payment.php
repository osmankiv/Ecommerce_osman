<?php
include '../../config/database.php';

  session_start();
$user_id = $_SESSION["username"];
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']): 0.00;
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '' ;

if($user_id){

    $sql = 'INSERT INTO orders (`user_id`)VALUES (user_id)';
   // $stmt = $conn->prepare($sql);

    if($conn->query($sql)){
       header("location:done?masseg=order added successfully");
    }else{
        echo "Error:" . $conn->error;
    }
   
}
    else{
        echo "Invalid input<br>";
         header("location:payment.html?masseg=error");
         echo $conn->error;
    }

$conn->close();

?>