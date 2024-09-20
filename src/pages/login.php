<?php
include '/config/database.php';

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
            echo 'Login successful';
        } else {
            echo "Invalid password";
        }
    } else {
        echo 'Username not found!';
    }

    $stmt->close();
    $conn->close();
}
?>
