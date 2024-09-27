<?php
include "../../config/database.php";
  session_start();
  if($_SESSION["log_in"]){
 if($_SESSION["log_in"]== true){
    echo"Wlcome ".$_SESSION["username"];
    $userid=$_SESSION["userid"];
// 
 }
}
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/product-details.css">
        <title>Product Details</title>
        <style>
            /* General Styles */

        </style>
    </head>

    <body>
        <header>
            <nav>
                <div class="logo">
                    <img src="../assets/images/payment_methods/72x72/mollie.png" alt="">
                </div>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../pages/product_details.php?id=<?=$id?>">Products</a></li>
                    <!-- <li><a href="#">Contact</a></li> -->
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <?php
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
               
               $stmt= "SELECT * FROM `products` WHERE `id`=$id";
                $result=$conn->query($stmt);
                if($result->num_rows > 0 ){
                    while($row = $result->fetch_assoc()){
                        $products_id=      $row["id"];
                        $products_name=       $row["products_name"];
                        $products_description=$row["products_description"];
                        $products_price=      $row["products_price"];
                        $products_image_url=  $row["products_image_url"];
                        $products_type=       $row["products_type"];
                } ?>
            <div class="product-details">
                <div class="product-image">
                    <img src="../assets/images/<?=$products_image_url?>" alt="">
                </div>
                <div class="product-info">
                    <h1><?=$products_name?></h1>
                    <p class="product_discription"><?=$products_description?></p>
                    <p class="product-price"><?=$products_price?></p>
                    <div class="button-container">
                        <button class="buy-now"><a href="../pages/payment.php?total=<?=$products_price?>">Buy Now</a></button>
                        <!-- <button class="add-to-cart">Add To Card</button> -->
                    </div>
                </div>
            </div>
            <?php
            }
                                        }
                                        ?>
        </main>

        

        <footer class="footer">
            <p>&copy;2024 Team OIU. All rights reserved.</p>
            <?php
            // include"../components/footer.php";
            ?>
        </footer>

    </body>

</html>
