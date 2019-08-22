<?php 
include 'db.php';


 function checkEmail($validate_email){
     global $pdo;
     $sql="SELECT email from inserts WHERE email= :email";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(":email",$validate_email);
    $stmt->execute();

    $count=$stmt->rowCount();
    if($count>0){
      return true;
    }else{
      return false;
    }

  }
  function checkUsername($username){
    global $pdo;
    $sql="SELECT email from inserts WHERE username= :username";
   $stmt=$pdo->prepare($sql);
   $stmt->bindValue(":username",$username);
   $stmt->execute();

   $count=$stmt->rowCount();
   if($count>0){
     return true;
   }else{
     return false;
   }

 }


?>