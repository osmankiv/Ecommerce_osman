<?php
//clone databies conntion
    include "../../config/database.php";
    echo"<h1>welcom admin!</h1>";
    $id=$_GET['pr_id'];
    $stmt ="SELECT * FROM `products` WHERE `id` = $id";
    $result=$conn->query($stmt);
    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
            $id=$row['id'];
            $products_name=$_POST['products_name'];
            $products_descrription=$_POST['products_descrription'];
            $products_price=$_POST['products_price'];
            $products_image=$_POST['products_image'];
            $products_type=$_POST['products_type'];
            $updata="UPDATE `products` SET `products_name`='$products_name',`products_description`='$products_descrription',`products_price`=' $products_price',`products_image_url`=' $products_image',`products_type`='$products_type' WHERE `id`=$id";
              if( $conn->query($updata)){
                echo"updata is done";
                header("location:control_panel");
                // header("Location: edit-company.php");
              }
            
        }
    }
?>