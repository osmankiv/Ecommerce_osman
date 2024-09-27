<!DOCTYPE html>
<html>
    <header>
        <title>conrol panel</title>
        <meta lang="en">
        <meta lang="ar">
        <meta charset="utf-e8">
        <link rel="website icon" type="png" href=""> 
        <link rel="stylesheet" href="../assets/css/control_panel.css">
    </header>
    <body>
        
        <?php
            //clone navbar
            include "../components/navbar.php";
            //clone databies conntion
            include "../../config/database.php";
            echo"<h1>welcom admin!</h1>";
              //delete
           
              if(isset($_POST['delete'])){
                $id=$_POST['pr_id'];
                $delete ="DELETE FROM `products` WHERE `id` = $id ";
                $conn->query($delete);
              }
              //update
              
               if(isset($_POST['updata'])){
                $id=$_POST['pr_id'];

                 $stmt ="SELECT * FROM `products` WHERE `id` = $id  ";
                        $result=$conn->query($stmt);
                        if($result->num_rows > 0 ){
                            while($row = $result->fetch_assoc()){
                                ?>
                                    <form action="updata.php?pr_id=<?=$id?>" method="POST"  class="form" >
                                        
                                        <h3> updata PRODUCTS</h3>

                                        <label>products name</label>
                                        <input type="text" name="products_name" value="<?=$row['products_name']?>"></input>


                                         <label>products descrription</label>
                                        <input type="text" name="products_descrription"  value="<?=$row['products_description']?>"></input>

                                         <label>products price</label>
                                        <input type="number" name="products_price"  value="<?=$row['products_price']?>"></input>
                                        <div class="rite">
                                            <label>products image</label>
                                            <input type="file" name="products_image"  value=""></input>

                                            <label>products type </label>
                                            <input type="text" name="products_type"  value="<?=$row['products_type']?>"></input>
                                        </div>

                                        

                                         <button name="Update_data">  Update data</button>
                
                                    </form>
                                    <?php
                                   
                            }
                        }
                        
                        
               }
               

                       
              
                    
        ?>
        <main>
            
            <form action="control_panel.php" method="POST" enctype="multipart/form-data" class="form" >
                <div class="funtion">
                    <label>delete /updata</label>
                    <input type="number" name="pr_id" >
                    <br>
                    <button name=delete> delete </button>

                    <button name=updata> updata </button>
                    <br>
                </div>
            </form>
                
            
            <?php
            
            // if(isset($_POST['add'])){
              
            //     $products_name=$_POST['products_name'];
            //     $products_descrription=$_POST['products_descrription'];
            //     $products_price=$_POST['products_price'];
            //     $products_image=$_FILES['products_image']["name"];
            //     $products_type=$_POST['products_type'];
            //     $stmt="INSERT INTO `products`(`id`, `products_name`, `products_description`, `products_price`, `products_image_url`, `products_type`) VALUES (null,'$products_name','$products_descrription','$products_price','$products_image','$products_type')";
                
            //     //uplode tha files "the imeg if item
            //     $itme_dir = "";
            //     $name=$_FILES["products_image"]["name"];
            //     $temp=$_FILES["products_image"]["tmp_name"];
            //     $file_dir = dirname(__FILE__).$itme_dir.$name;
            //     if(move_uploaded_file($temp,$file_dir)){
            //         echo"done uplod";
            //     }
               

            //      $conn->query($stmt);


            // }

                        
               
                
                
               



            ?>
            <div class="titel_1">
                <label class="ADD">ADD</label>
                <labule class="mangmant"> mangmant</label>

            </div>
           
            
            <form action="../assets/images/add.php" method="POST"  enctype="multipart/form-data" class="form" >
                <h3> ADD PRODUCTS</h3>
      
                <label>products name</label>
                <input type="text" name="products_name"></input>
            

                 <label>products descrription</label>
                <input type="text" name="products_descrription"></input>
              
                 <label>products price</label>
                <input type="number" name="products_price"></input>
                <div class="rite">
                    <label>products image</label>
                    <input type="file" name="products_image"></input>

                    <label>products type </label>
                    <input type="text" name="products_type"></input>
                </div>

                 <button name="add"> Add </button>
                
            </form>
            <div class="contenr">
                <form action="control_panel.php" method="POST"  class="form2" >
                     <div class=display>
                        
                    <?php
                    $stmt ="SELECT * FROM `products` ";
                        $result=$conn->query($stmt);
                        if($result->num_rows > 0 ){
                            echo"
                                 <div class=display>
                                    <table id = display> 
                                        <tr>
                                            <th>id</th>
                                            <th>products name</th>
                                            <th>products descrription</th>
                                            <th>products price</th>
                                            <th>products image</th>
                                            <th>products type</th>
                                           
                                        </tr>
                                    <table>
                                </div>";
                                 while($row = $result->fetch_assoc()){
                                echo "
                                <div class=display>
                                    <table id = display> 
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                ".$row['id']."
                                            </td>
                                            <td>
                                                ".$row['products_name']."
                                            </td>
                                            <td>
                                                ".$row['products_description']."
                                            </td>
                                            <td>
                                                ".$row['products_price']."
                                            </td>
                                            <td>
                                                ".$row['products_image_url']."
                                            </td>
                                            <td>
                                                ".$row['products_type']."
                                            </td>
                                        
                                        </tr>
                                    </table>
                                    </div>
                                    ";
                                  
                            }
                        }
                    ?>

                </form>
            </div>






        </main>



        <?php
            //clone footer
            include "../components/footer.php"
        
        ?>
    </body>
</html>
