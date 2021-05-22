<?php
  session_start();
  include "db_conn.php";
  include "utilities.php"; 

  if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])){
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio</title>

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="topnav.css" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="modal.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script defer src="index.js">
      window.glob = "editMode";
      window.glob = "deleteMode";
    </script>
    <script defer src="modal.js"></script>
  </head>

  <body>
    

    <div class="topnav" id="myTopnav">
      <a href="javascript:void(0);" class="icon" onclick="openNav()">
        <i class="fa fa-bars"></i>
      </a>
      
      <div class="page-title">Product Portofolio</div>

      <div></div>

    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        >&times;</a
      >
      <a onClick="openAddProductModal()" href="#">Add Product</a>
      <a href="#" onClick="openEditMode()">Edit Product</a>
      <a onClick="openDeleteMode()" href="#">Delete Product</a>
      <a onClick="openLogOutModal()">Log out</a>
    </div>

    <div id="logOutModal" class="modal">
      <div class="modal-content">
        <div style="display: flex; flex-direction:column; justify-content: space-around;">
          <p>Are you sure you want to log out?</p>
          <form action="logout.php" method="post" style="min-height:auto;">
            <button type="submit">Yes</button>
            <button type="button" onClick="closeLogOutModal()" >No</button>
          </form>
         
        </div>
      </div>
    </div>
   

  
    <div id="addProductModal" class="modal">
      <div class="modal-content">
        <span class="close" onClick="closeAddProductModal()">&times;</span>

        <form action='addProductHandle.php' method="post">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required/>

          <label for="brand">Brand:</label>
          <input type="text" id="brand" name="brand" required/>

          <label for="description">Description:</label>
          <input type="text" id="description" name="description" required/>

          <label for="price">Price:</label>
          <input type="text" id="price" name="price" required/>
          <label for="image_url">Image URL (with extension):</label>
          <input type="text" id="image_url" name="image_url" required/>

          <button type="submit">Add Product</button>
          
        </form>
      </div>
    </div>

    <div class="product-container">
    <?php

      $sql = $conn->prepare("select `id`, `name`, `brand`, `description`, `price`, `image_url` from
      products.products");

      $sql->execute();
      $res = $sql->get_result();

      if($res->num_rows > 0){
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $_SESSION["products"] = $data;
        foreach($data as $row){
          echo 
          "<div class='product'" .
          "data-name='". $row["name"].
          "' data-brand='". $row["brand"].
          "' id='". $row["id"].
          "' data-description='". $row["description"].
          "' data-price='". $row["price"].
          "' data-image_url='". $row["image_url"].
          "'> " . "<img id=" . $row["id"] ."      src='images/" . $row["image_url"] . "' " . " onClick='openProductModal(this.id)' />" .
        "</div>
        
        
        <div id='productDetailsModal". $row["id"] ."' class='modal'>
          <div class='modal-content'>
            <span class='close' onClick='closeProductDetailsModal(".$row["id"].")'>&times;</span><br>
              <p> Name: ".$row["name"] ."</p>
              <p> Brand: ".$row["brand"] ."</p>
              <p> Description: ".$row["description"] ."</p>
              <p> Price: ".$row["price"] ."</p>
           </div>
        </div>
        
        <div id='editProductModal". $row["id"] ."' class='modal'>
          <div class='modal-content'>
            <span class='close' onClick='closeEditProductModal(".$row["id"].")'>&times;</span>
            <form action='editProductHandle.php' method='post'>
              <label for='name'>Name:</label>
              <input type='text' id='name' name='name' required value=". $row["name"] .">

              <label for='brand'>Brand:</label>
              <input type='text' id='brand' name='brand' required value=". $row["brand"] .">

              <label for='description'>Description:</label>
              <input type='text' id='description' name='description' required value=". $row["description"] .">

              <label for='price'>Price:</label>
              <input type='text' id='price' name='price' required value=". $row["price"] .">

              <label for='image_url'>Image URL (with extension):</label>
              <input type='text' id='image_url' name='image_url' required value=". $row["image_url"] .">

              <input type='hidden' id='id' name='id' value=".$row["id"].">

              <button type='submit'>Edit Product</button>
              
            </form>
          </div>
        </div>

        <div id='deleteProductModal". $row["id"] ."' class='modal'>
          <div class='modal-content'>
            <span class='close' onClick='closeDeleteProductModal(".$row["id"].")'>&times;</span>
            <p>Are you sure you want to delete this product?</p>
            <div style='display: flex; width: 100%; flex-direction: row; justify-content: space-around;'>
              <form action='deleteProductHandle.php' method='post' style='min-height:auto'>
                
                <input id='id' name='id' type='hidden' value=". $row["id"].">
                <button type='submit'> Yes </button>
              
                <button type='button' onClick='closeDeleteProductModal(".$row["id"].")'> No </button>
              </form>
            </div>
            
          </div>
        </div>
        ";
        }

      }else{
        echo "No products";
      }


?>
    </div>

    

    <!-- Use any element to open the sidenav -->
  </body>
</html>
