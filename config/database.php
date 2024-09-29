<?php
$host = "localhost";
$user_name = "root";
$password = "";
$database_name = "mollie";

$conn = new mysqli($host, $user_name, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_query_create_database = "CREATE DATABASE IF NOT EXISTS $database_name";
if ($conn->query($sql_query_create_database) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}


$conn = new mysqli($host, $user_name, $password, $database_name);


$sql_query_create_table1 = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    products_name VARCHAR(100),
    products_description TEXT,
    products_price DECIMAL(10,2),
    products_image_url VARCHAR(200),
    products_type VARCHAR(100)
)";

$sql_query_create_table2 = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password_hash VARCHAR(200),
    gender VARCHAR(10)
)";

$sql_query_create_table3 = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6),
    total_price DECIMAL(10,2),
    payment_method ENUM('visa', 'Bok'),
    cvv VARCHAR(4),
    address VARCHAR(255),
    zip_code VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";


$sql_query_create_table4 = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6),
    product_id INT(6),
    user_id int DEFAULT NULL,
    quantity INT,
    price DECIMAL(10,2),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";


if ($conn->query($sql_query_create_table1) === TRUE &&
    $conn->query($sql_query_create_table2) === TRUE &&
    $conn->query($sql_query_create_table3) === TRUE &&
    $conn->query($sql_query_create_table4) === TRUE) {
    echo "All tables created successfully.";
  
    //$ins='INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `gender`) VALUES (1, "admin", "admin@gmailcom","$2y$10$M0LAQwi5FRksDkB.SKKxpO.0rAALfx8ypg0mBdw/7bCbcSkH.ZN/m","male"';

    // $ins="INSERT INTO `users`(`id`, `username`, `email`, `password_hash`, `gender`) VALUES (null,'admin','admin@gmailcom','$2y$10.SKKxpO.0rAALfx8ypg0mBdw/7bCbcSkH.ZN/m','male')";

    // if($conn->query($ins) === true){
    //     echo"done";
    // } else{
    //    echo $conn->error;
    // }

} else {
    die ("Error creating tables: " . $conn->error);
}


?>
