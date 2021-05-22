<?php 
include "db_conn.php";
$sql =  $conn->prepare("update products.products set name=?, brand=?, description=?, price=?, image_url=? where id=?");
echo $_POST["image_url"];
$sql->bind_param("ssssss", $_POST["name"], $_POST["brand"], $_POST["description"], $_POST["price"],$_POST["image_url"] , $_POST["id"]);

if($sql->execute() === true){
    $successMessage = "Product edited!";
    echo "<script>
        
            alert('$successMessage');
        
        </script>";
} else{
    $failMessage = "ERROR: Could not execute " . $conn->error;
    echo "<script>
        
            alert('$failMessage');
        
        </script>";
}

//header("Location: index.php");

?>