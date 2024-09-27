<?php
    include"../../config/database.php";
    session_start();
    $id=$_SESSION["username"];
    $sqlDelete = "DELETE FROM `order_items` WHERE `user_id` =$id";
    if($conn->query($sqlDelete)){
        echo "done";
    }
    else{
        echo $conn->error;
    }
    $_SESSION["log_in"]=false;
    $_SESSION["username"]="";
    $_SESSION["userid"]="";
    header("location:../index.php?masseg=Logout successful!");
?>
