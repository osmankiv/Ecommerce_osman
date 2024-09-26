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
           // echo 'Login successful';
             header("location:../index.php?masseg=Login successful!");
            $_SESSION["log_in"]=TRUE;
            $_SESSION["username"]=$row['username'];
            $_SESSION["userid"]=$row['id'];

        } else {
           header("location:login.html?masseg=Username not found!");
        }
    } else {
        echo 'Username not found!';
        header("location:login.html?masseg=Username not found!");
    }

    $stmt->close();
    $conn->close();
}
?>
