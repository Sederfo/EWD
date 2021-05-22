# Product Portofolio
This is a website made with HTML, PHP and Js. It connects to a "products" database and displays the products in a grid manner using flexbox.

## Installation

Install XAMP and create a "products" database. Then, run the SQL queries found in sql_queries.txt to create the "products" and "users" tables and insert some products.

## Usage

Click the 3 bars on the top-left side of the page to bring up the side navigation menu with 4 options that do exactly what they say they do.
##### Add product
Brings up a modal with a form. The user fills out the form with data which is then sent to addProductHandle.php which handles the insertion in the table using prepared statements.

##### Edit product
Enables the user to click on any product on the page to bring up a form which enables them to edit the data. The form sends the data to editProductHandle.php which handles insertion.

##### Delete product
Enables the user to click on any product on the page to bring up a form with a yes and a no button. If yes is clicked, the id of the product is sent to deleteProductHandle.php which deletes the entry from the table.


##### Log out
Prompts the user with a yes / no form. By clicking yes, the current session will be unset and the user will be taken to the log in page.

