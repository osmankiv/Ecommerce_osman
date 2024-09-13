<!DOCTYPE html>
<html>
    <header>
        <title>home page</title>
        <meta lang="en">
        <meta lang="ar">
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/style.css">

    </header>
<?php
// imprt database conntion
include "../config/database.php";
//search

?>
    <body>

        <nav>
            <div class="logo"><img src=" assets/images/payment_methods/72x72/mollie.png" alt="logo"></div>

            <ul>
                <li><a href="#">profiel</a></li>
                <li><a href="#bookes">bookes</a></li>
                <li><a href="#cars">cars</a></li>
                <li><a href="pages/control_panel.php">control</a></li>
                <li><a href="pages/login.html">log,in</a></li>
                <li class="one"><a href="index.html">Home</a></li>
                <li>
                    <div class="shopping">
                        <img src="assets/images/shopping.svg">
                        <span class="quantity" id="quantity">0</span>
                    </div>
                </li>
            </ul>
            <form action="index.php" method="POST"  class="form">
                <div class="search_box_ginral ">
                    <input type="text" placeholder="search " name="search_box" class="search_box">
                    <button name="search" class="search_button" type="submit"> <img src=" assets/images/search.png"
                            alt="search icon"></button>
                              
                </div>
                
            </form>
            <?php
                if(isset($_POST['search'])){
                    $search_box =  $_POST['search_box'];
                    $stmt ="SELECT * FROM `products` WHERE products_name LIKE '%$search_box%'  ";
                    $result=$conn->query($stmt);
                    if($result->num_rows > 0 ){
                        while($row = $result->fetch_assoc()){
                            $result_search= $row["products_name"];
                            $products_name=       $row["products_name"];
                            $products_description=$row["products_description"];
                            $products_price=      $row["products_price"];
                            $products_image_url=  $row["products_image_url"];
                            $products_type=       $row["products_type"];                    
                            if($search_box != ""){
                                echo'  
                                     <div class="items">
                                         <div class="sub_items_contner">
                                             <div class="part_prodect">
                                                 <div class="card_prodect">
                                                   <a href="pages/product_details.html"> <!-- need to code-->
                                                       <img src=" '.$products_image_url.'"
                                                           alt="">
                                                       <div class="name_prodect"><'.$products_name.'</div>
                                                       <div class="name_discraption"><'. $products_description.   '<div>

                                                       <div class="pric">'.$products_price.'</div>
                                                   </a>

                                                   <button type="submit" class="buy"     name="buy_prodcet">buy</    button>
                                                   <button type="submit" class="add_to_card"     name="buy_prodcet"
                                                       onclick="addOrders()">add to
                                                       card</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                ';
                            }
                        }   
                    }

                }
                              
                              ?>
        </nav>
        <div class="ads">
            <div class="ads_content">
                &copy;2024 Team OIU. All rights reserved.
            </div>
        </div>

        <main>
            <div class="card">
                <h1>Card</h1>
                <ul class="listCard">

                </ul>
                <div class="checkOut">
                    <div class="total" id="total">0</div>
                    <div class="closeShopping">Close</div>
                </div>
                <button class="order">Order now</button>
            </div>
            <div class=" header">
                <p>Explore New Place </p>
                <h5> engoy every good moment </h5>

                <div class="card_top"></div>
                <img src=" assets/images/pattern-placeholders/man-person-music-black-and-white-white-photography.jpg"
                    alt="">
                <div class="top_item_fun">
                    <ul>
                        <li><label> best 1 </label></li>
                        <li><label>+107034</label></li>
                        <li><button type="text" class="buy_now" name="buy_now">BUY NOW</button> </li>
                    </ul>
                </div>
            </div>
            <div class="scrol_styel1"></div>
            <div class="scrol_styel2"></div>
            <div class="parts">
                <ul>
                    <li><a href="#"><img src=" assets/images/leather-guitar-typewriter-red-gadget-sofa.png"
                                alt="tshirt"> </a>
                    </li>
                    <li><a href="#"><img src=" assets/images/41a6RAkYHlL._SR140,140_.jpg" alt=""> </a></li>
                    <li><a href="#"><img src=" assets/images/table-white-chair-floor-shelf-lamp-square-lg.png" alt="">
                        </a></li>
                    <li><a href="#"><img src=" assets/images/41Pj5XsWUcL._SR140,140_.jpg" alt=""></a></li>
                    <li><a href="#"><img src="assets/images/previews/tshirt.jpg" alt=""> </a></li>
                </ul>
            </div>

            <div class="item_contenr">
                <section>
                    <article>
                        <h3 id="cars"> part1 </h3>
                                <div class="items">
                       
                                    <?php
                                        $stmt= "SELECT * FROM `products`";
                                        $result=$conn->query($stmt);
                                        if($result->num_rows > 0 ){
                                        
                                            while($row = $result->fetch_assoc()){
                                                $products_name=       $row["products_name"];
                                                $products_description=$row["products_description"];
                                                $products_price=      $row["products_price"];
                                                $products_image_url=  $row["products_image_url"];
                                                $products_type=       $row["products_type"];
                                            

                                                echo'  
                                                 
                                                        <div class="sub_items_contner">
                                                            <div class="part_prodect">
                                                                <div class="card_prodect">
                                                                  <a href="pages/product_details.html"> <!-- need to code-->
                                                                      <img src=" '.$products_image_url.'"
                                                                          alt="">
                                                                      <div class="name_prodect"><'.$products_name.'</div>
                                                                      <div class="name_discraption"><'. $products_description.   '<div>

                                                                      <div class="pric">'.$products_price.'</div>
                                                                  </a>

                                                                  <button type="submit" class="buy"     name="buy_prodcet">buy</    button>
                                                                  <button type="submit" class="add_to_card"     name="buy_prodcet"
                                                                      onclick="addOrders()">add to
                                                                      card</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   
                                                    ';
                                                    
                                            }
                                        }

                                    ?>
                                </div>
                                 
      <!--------------------------------------------------------------------------------------------------->

                           
                    </article>
                    <article>
                        <h3 id="bookes"> part2 </h3>
                       
                                    <?php
                                        $stmt= "SELECT * FROM `products`";
                                        $result=$conn->query($stmt);
                                        if($result->num_rows > 0 ){
                                        
                                            while($row = $result->fetch_assoc()){
                                                $products_name=       $row["products_name"];
                                                $products_description=$row["products_description"];
                                                $products_price=      $row["products_price"];
                                                $products_image_url=  $row["products_image_url"];
                                                $products_type=       $row["products_type"];
                                            

                                                echo'  
                                                    <div class="items">
                                                        <div class="sub_items_contner">
                                                            <div class="part_prodect">
                                                                <div class="card_prodect">
                                                                  <a href="pages/product_details.html"> <!-- need to code-->
                                                                      <img src=" '.$products_image_url.'"
                                                                          alt="">
                                                                      <div class="name_prodect"><'.$products_name.'</div>
                                                                      <div class="name_discraption"><'. $products_description.   '<div>
                                                
                                                                      <div class="pric">'.$products_price.'</div>
                                                                  </a>
                                                
                                                                  <button type="submit" class="buy"     name="buy_prodcet">buy</    button>
                                                                  <button type="submit" class="add_to_card"     name="buy_prodcet"
                                                                      onclick="addOrders()">add to
                                                                      card</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                    
                                            }
                                        }

                                    ?>
                                    <!--------------------------------------------------------------------------------------------------->
                          
                    </article>
                </section>
            </div>
            <div class="main_tic">
                <label class="tic_haeder">technical support</label>
                <div class="dis1">
                    <div class="dot"></div>
                </div>
                <div class="dis2">
                    <div class="dot2"></div>

                </div>

                <div class="tic_support">if you facing any problem ,please contact tha technical support
                    directly
                    <div class="tic_support2"> or
                        send us a message .... thank you
                    </div>
                    <div class="sending">
                        <input type="text" name="castmer_masseg">
                        <button name="send_masseg"><img src=" assets/images/352510_local_phone_icon.png" alt=""
                                class="send_img"></button>
                    </div>

                </div>
            </div>

        </main>
        <footer>

            <div class="footer">
                <img src=" assets/images/tech-support.gif " alt="" class="tech_support_img">
                <h3>mollie team</h3>
                <div class="footer_text">:bashir Hassan Bashir Mosaed</div>
            </div>

            <div class="footer">
                <img src=" assets/images/tech-support.gif " alt="" class="tech_support_img">
                <h3>Technical support team</h3>
                <div class="footer_text">
                    : osman al smani osman </div>
            </div>

            <div class="footer">
                <img src=" assets/images/tech-support.gif " alt="" class="tech_support_img">
                <h3> Technical support team</h3>
                <div class="footer_text">:ahmed abdel alelah abuzeid</div>
            </div>
            <div class="footer">
                <img src=" assets/images/tech-support.gif " alt="" class="tech_support_img">
                <h3> Technical support team</h3>
                <div class="footer_text">:abu-Qasim muhamed</div>
            </div>
            <div class="footer">
                <img src=" assets/images/tech-support.gif " alt="" class="tech_support_img">
                <h3>Technical support team</h3>
                <div class="footer_text">:Awad Essam El Din Mohmaed</div>
            </div>
            <link rel="htmlpage" href="components/footer.htm">
        </footer>

        <script src="assets/js/indexScript.js"></script>
    </body>

</html>
