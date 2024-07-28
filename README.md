# E-commerce Project

This project is a simple e-commerce website using basic web technologies. The project is divided into two main parts: Front End and Back End.

## Technologies Used

### Front End

- **HTML**: For structuring the pages.
- **CSS**: For styling and designing the pages.
- **JavaScript**: For adding dynamic interactions.
- **Bootstrap**: Framework for quickly designing responsive interfaces.

### Back End

- **PHP**: For server-side processing and database interactions.

## Project Structure

ecommerce_project/
├── src/
│   ├── assets/
│   │   ├── css/
│   │   │   └── styles.css
│   │   ├── js/
│   │   │   └── scripts.js
│   │   └── images/
│   │       └── logo.png
│   ├── components/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar.php
│   ├── pages/
│   │   ├── home.php
│   │   ├── product.php
│   │   └── cart.php
│   └── index.php
├── public/
│   ├── index.html
│   └── favicon.ico
├── vendor/           # Will be created when running composer install
├── .gitignore
├── composer.json
├── package.json
└── README.md

## Usage Instructions

### Setting Up the Environment

1. **Clone the repository**:
    
bash
    git clone https://github.com/Ahmedabdulelah/Ecommerce.git
   

2. **Install dependencies (when adding the back end)**:
    Ensure you have Composer installed. If not, you can download it from [here](https://getcomposer.org/).

    
bash
    cd ecommerce_project
    composer install
   

### Running the Project

1. **Open the main file**:
    You can open `public/index.html` in your web browser to see the basic front-end design.

### File Structure

- **src/assets**: Contains assets such as CSS, JS, and images.
- **src/components**: Contains reusable UI components like headers and footers.
- **src/pages**: Contains the different pages of the website.
- **src/index.php**: The main entry point for the application.

- **services**: To manage the main service operations and functions in the application.
- **utils**: For helper functions.
- **config**: For application configuration files.


### Additional Usage Instructions

#### Setting Up the Database

1. Create a new database on your MySQL server. For example:
    
sql
    CREATE DATABASE ecommerce;
   

2. Update the configuration file `src/config/config.php` with your database details.

3. Run the necessary SQL scripts to create the required tables in your database.
