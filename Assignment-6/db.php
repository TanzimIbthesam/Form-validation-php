<?php 
$dsn="mysql:host=localhost;dbname=cit crud";
$username="root";
$password="";

try{
    $pdo=new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //  echo "Connection established successfully";
}catch (PDOException $e){
     die("Connection Error").$e->getMessage();
}



?>