<?php
$host = "localhost";
$user_name = "root";
$password = "";
$database_name = "mollie";

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user_name, $password);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إنشاء قاعدة البيانات إذا لم تكن موجودة
$sql_query_create_database = "CREATE DATABASE IF NOT EXISTS $database_name";
if ($conn->query($sql_query_create_database) === TRUE) {
    // echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// إعادة الاتصال بقاعدة البيانات بعد إنشائها
$conn = new mysqli($host, $user_name, $password, $database_name);

// إنشاء الجداول
$sql_query_create_table1 = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    products_name VARCHAR(100),
    products_description TEXT,
    products_price INT,
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
    payment_method ENUM('visa','Bok')
    -- FOREIGN KEY (user_id) REFERENCES users(id)
)";

$sql_query_create_table4 = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6),
    product_id INT(6),
    price DECIMAL(10,2), 
    user_id INT(6)
    -- FOREIGN KEY (order_id) REFERENCES orders(id)
    -- FOREIGN KEY (product_id) REFERENCES products(id) 
)";

// تنفيذ استعلامات إنشاء الجداول
if ($conn->query($sql_query_create_table1) === TRUE &&
    $conn->query($sql_query_create_table2) === TRUE &&
    $conn->query($sql_query_create_table3) === TRUE &&
    $conn->query($sql_query_create_table4) === TRUE) {
    // echo "All tables created successfully.";
} else {
    die ("Error creating tables: " . $conn->error);
}

// $conn->close();
?>
