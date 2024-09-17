<?php
include '/config/config.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password_hash = $_POST['password_hash'];
    $repassword = $_POST['user_repassword'];
    $gender = $_POST['gender'];

    if ($password !== $repassword) {
        echo 'Passwords do not match!';
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, email, phone, password_hash, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('sssss', $username, $email, $phone, $password_hash, $gender);

    if ($stmt->execute()) {
        echo 'Registration successful';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
