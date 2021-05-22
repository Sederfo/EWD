<?php
include "db_conn.php";
$sql = $conn->prepare ("delete from products.products where id=(?);");
$sql->bind_param("i", $_POST["id"]);

if ($sql->execute() === TRUE) {
  $successMessage = "Product deleted successfully!" . $_POST["id"];
  echo "<script>
      
        alert('$successMessage');
      
      </script>";
} else {
  $failMessage = "Error deleting product: " . $conn->error;
  echo "<script>
      
        alert('$failMessage');
      
      </script>";
}

header("Location: index.php");
?>
