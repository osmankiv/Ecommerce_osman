<?php


            //clone databies conntion
            include "../../../config/database.php";
            echo"<h1>welcom admin!</h1>";


            if(isset($_POST['add'])){
              
                $products_name=$_POST['products_name'];
                $products_descrription=$_POST['products_descrription'];
                $products_price=$_POST['products_price'];
                $products_image=$_FILES['products_image']["name"];
                $products_type=$_POST['products_type'];
                $stmt="INSERT INTO `products`(`id`, `products_name`, `products_description`, `products_price`, `products_image_url`, `products_type`) VALUES (null,'$products_name','$products_descrription','$products_price','$products_image','$products_type')";
                
                //uplode tha files "the imeg if item
                $itme_dir = "/";
                $name=$_FILES["products_image"]["name"];
                $temp=$_FILES["products_image"]["tmp_name"];
                $file_dir = dirname(__FILE__).$itme_dir.$name;
                if(move_uploaded_file($temp,$file_dir)){
                    echo"done uplod";
                    
                }
               

                 $conn->query($stmt);


            }
            header("location:../../pages/control_panel.php");
?>