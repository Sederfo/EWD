<?php
include "db_conn.php";
$sql =  $conn->prepare("insert into products.products(`name`,`brand`, `description`, `price`, `image_url`)
values (?,?,?,?,?);");
$sql->bind_param("sssss", $_POST["name"], $_POST["brand"], $_POST["description"], $_POST["price"], $_POST["image_url"]);

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

header("Location: index.php");
?>