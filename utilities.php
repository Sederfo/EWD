<?php
  
  session_status() === PHP_SESSION_ACTIVE ?: session_start();
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function addProduct($name, $brand, $description, $price, $image_url){
    include "db_conn.php";
    $sql =  $conn->prepare("insert into products.products(`name`,`brand`, `description`, `price`, `image_url`)
    values (?,?,?,?,?);");
    $sql->bind_param("sssss", $name, $brand, $description, $price, $image_url);


    
    if($sql->execute() === true){
      $successMessage = "Product added!";
      echo "<script>
          
            alert('$successMessage');
          
          </script>";
    } else{
      $failMessage = "ERROR: Could not able to execute $sql. " . $conn->error;
      echo "<script>
          
            alert('$failMessage');
          
          </script>";
    }
  }

  function deleteProduct($id){
    include "db_conn.php";
    $sql = $conn->prepare ("delete from products.products where id=(?);");
    $sql->bind_param("i", $id);

    

    if ($sql->execute() === TRUE) {
      $successMessage = "Product deleted successfully!" . $id;
      echo "<script>
          
            alert('$successMessage');
          
          </script>";
    } else {
      $failMessage = "Error deleting product: " . $conn->error;
      echo "<script>
          
            alert('$failMessage');
          
          </script>";
    }
  }

  function editProduct($name, $brand, $description, $price, $image_url){
    echo $name. $brand. $description. $price. $image_url;
  }
?>
