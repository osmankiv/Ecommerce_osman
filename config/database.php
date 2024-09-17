<?php
$host="localhost";
$user_name="root";
$password="";
$database_name="mollie";
$conn=new mysqli($host,$user_name,$password,$database_name); //if you clone ->$conn=new mysqli($host,$user_name,$password) and $database_name=""


/*
//crrat  tha database//
$conn=new mysqli($host,$user_name,$password);
//connection is done?
if($conn->connect_error){
    echo "$conn->connect_error";
}
else{
   echo"contion is done";

    //craate database "mollie"
    if($database_name === ""){
        $sql_query_craate_database="CREATE DATABASE mollie";
        if($conn->query($sql_query_craate_database) === true){
        echo "crate database sccessfully ";
        $database_name="mollie";
        
    }
}
else{
   echo"<br>
   can't craate database '".$conn->error;
}
$conn=new mysqli($host,$user_name,$password,$database_name);
        $sql_query_craate_table1="CREATE TABLE products( 
            id INT (6),
            products_name TEXT (10),
            products_description TEXT (200),
            products_price INT (10),
            products_image_url TEXT(200),
            products_type TEXT (100)
            )";
            $sql_query_craate_table2="CREATE TABLE users( 
            id INT (6),
            username TEXT (10),
            products_description TEXT (200),
            email TEXT (10),
            passwerd_hash TEXT(200),
            geder TEXT(200)
            )";
            $sql_query_craate_table3="CREATE TABLE orders( 
            id INT (6),
            user_id TEXT (6),
            total_price INT (10),
            payment_method TEXT(200)
            )";
            $sql_query_craate_table4="CREATE TABLE order_items( 
            id INT (6),
            order_id INT (10),
            product_id INT  (200),
            price INT (100)
            
            )";

        if($conn->query($sql_query_craate_table1) === true && $conn->query($sql_query_craate_table2) === true && $conn->query($sql_query_craate_table3) === true && $conn->query($sql_query_craate_table4) === true){

       echo" done craate products table";
        }
        else{
       echo"<br>
       can't craate table '".$conn->error;

            }
    



}


//$conn->close();





*/
?>