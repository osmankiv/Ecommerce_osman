<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    username = $POST['username'];
    password = $POST['password'];


    sql = 'SELECT * FROM user WHERE username = ahmed';
    $stmt = conn->prepare($sql);
    $stmt = bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result -> num_row > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password,$row['password'])){
            echo 'Login successful';
            // هنا توجيه المستخدم
        }
        else {
            echo "invalid password";
        }
        else{
            echo 'username not found!';
        }
    }

    
    $stmt->close();
    $conn->close();
}



?>