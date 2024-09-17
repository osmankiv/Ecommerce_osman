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
            include "../../config/database.php"
        ?>
        <main>
            <h1>welcom admin!</h1>
            <form action="control_panel.php" method="POST"  class="form" >
                <div>
                    <label>delete /updata</label>
                    <input type="number" name="pr_id" >
                    <br>
                    <button name=delete> delete </button>
                    <button name=updata> updata </button>
                </div>
            </form>
                
            
            <?php
            
            if(isset($_POST['add'])){
              
                $products_name=$_POST['products_name'];
                $products_descrription=$_POST['products_descrription'];
                $products_price=$_POST['products_price'];
                $products_image=$_POST['products_image'];
                $products_type=$_POST['products_type'];
                $stmt="INSERT INTO `products`(`id`, `products_name`, `products_description`, `products_price`, `products_image_url`, `products_type`) VALUES (null,'$products_name','$products_descrription','$products_price','$products_image','$products_type')";
                 $conn->query($stmt);


            }

            //delete
           
              if(isset($_POST['delete'])){
                $id=
                $delete ="DELETE FROM `products` WHERE `id`$ ";
                $conn->query($delete);
              }
                                  
               
                
                
               



            ?>
            <div class="titel_1">
                <label class="ADD">ADD</label>
                <labule class="mangmant"> mangmant</label>

            </div>
           
            
            <form action="control_panel.php" method="POST"  class="form" >
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
