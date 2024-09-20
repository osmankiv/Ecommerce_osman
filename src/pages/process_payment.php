<?php
include '/config/database.php';


$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) :0;
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']): 0.00;
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '' ;

if($user_id && $total_price > 0 && !empty($payment_methon)){

    $sql = 'INSERT INTO orders (user_id, total_price, payment_method VALUES (:user_id, :total_price';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ids", $user_id,$total_price,$payment_methon);

    if($stmt->execute()){
        echo "order added successfully";
    }else{
        echo "Error:" . $stmt->erorr;
    }
    $stmt->close();
}
    else{
        echo "Invalid input";
    }

$conn->close();

?>