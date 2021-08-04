<?php
  
  require 'dbConnect.php';
  function register($category,$phone,$amount){
  $conn=connect();
  $sql = $conn->prepare("INSERT INTO WALLET (category,phone,amount) values (?, ?, ?)");
  $sql->bind_param("sss",$category,$phone,$amount);

  return $sql->execute();
}



?>