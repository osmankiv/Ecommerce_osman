<!DOCTYPE html>
<html>
    <header>
        <title>nav</title>
        <meta lang="en">
        <meta lang="ar">
        <meta charset="utf-8">
         <link rel="stylesheet" href="../assets/css/style.css">
 
    </header>

<?php
// imprt database conntion
include "../../config/database.php";
//search

?>



    <nav>
        <div class="logo"><img src=" ../assets/images/payment_methods/72x72/mollie.png" alt="logo"></div>

        <ul>
            
            <!-- <li><a href="#">control</a></li> -->
            <li><a href="pages/login.html">log,in</a></li>
            <li class="one"><a href="/Ecommerce/src/index.php">Home</a></li>
            <li>
                <a href="../pages/customer_cart.php">
                <div class="shopping">
                    <img src="../assets/images/shopping.svg">
                    <span class="quantity" id="quantity"><?php
                                 session_start();
                                $userid=$_SESSION["userid"];
                                $stmt ="SELECT * FROM `order_items` WHERE `user_id`= '$userid'";
                                $result=$conn->query($stmt);
                                echo $result->num_rows;
                            
                            
                            ?></span>
                </div>
</a>
            </li>
        </ul>
     

        </form>
       
    </nav>
