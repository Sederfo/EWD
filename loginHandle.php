<?php
session_start();
include "db_conn.php";

function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['uname']) && isset($_POST['password'])) {

  $uname = validate($_POST['uname']);
  $password = validate($_POST['password']);

  $stmt = $conn->prepare("select username, password from products.users where username = ? and password = ?");

    $stmt->bind_param("ss", $uname, $password);

    $stmt->execute();

    $stmt->store_result();
    
    if($stmt->num_rows === 1){
        $stmt->bind_result($unameAux, $passwordAux);
        $stmt->fetch();
  
        if($unameAux === $uname && $passwordAux === $password){
            
            $_SESSION["username"] = $unameAux;
            $_SESSION["password"] = $passwordAux;
            
            header("Location: index.php");
            exit();
          }
        }
        else{
          header("Location: login.php?error=Incorrect username or password");
          exit();
        }
   
    
}else{
        header("Location: login.php?");
        exit();
}
 ?>