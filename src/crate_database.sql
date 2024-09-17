CREATE DATABASE mollie

CREATE TABLE products( 
            id INT (6),
            products_name TEXT (10),
            products_description TEXT (200),
            products_price INT (10),
            products_image_url TEXT(200),
            products_type TEXT (100)
),
         CREATE TABLE users( 
            id INT (6),
            username TEXT (10),
            products_description TEXT (200),
            email TEXT (10),
            passwerd_hash TEXT(200),
            geder TEXT(200)
        ),CREATE TABLE orders( 
            id INT (6),
            user_id TEXT (6),
            total_price INT (10),
            payment_method TEXT(200)
            ),
        CREATE TABLE order_items( 
            id INT (6),
            order_id INT (10),
            product_id INT  (200),
            price INT (100)
        )
            
       


