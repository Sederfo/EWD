<?php 
    $id = $_GET["id"];

    $sql = "delete from products.products where id='$id'";

    include "db_conn.php";

    if ($conn->query($sql) === TRUE) {
      $successMessage = "Product deleted successfully!";
      echo "<script>
          
            alert('$successMessage');
          
          </script>";
    } else {
      $failMessage = "Error deleting product: " . $conn->error;
      echo "<script>
          
            alert('$failMessage');
          
          </script>";
    }
  


?>