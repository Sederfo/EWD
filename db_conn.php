<?php
  $conn = new mysqli("localhost", "root", "", "products");

  if($conn->connect_error){
    echo "Connection failed!";
  }
  
 ?>
