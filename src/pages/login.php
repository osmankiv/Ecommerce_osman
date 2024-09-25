<?php
session_start();
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM users WHERE username = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../indexx.php");
            exit(); 
        } else {
            echo "خطأ في بيانات تسجيل الدخول"; 
        }
    } else {
        echo 'خطأ في بيانات تسجيل الدخول';
    }

    $stmt->close();
    $conn->close();
}
?>
