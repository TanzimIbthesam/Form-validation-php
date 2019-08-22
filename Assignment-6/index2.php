<?php 
//Query Execution
include 'db.php';
include 'function.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $username=$_POST['uname'];
   $phonenum=$_POST['phonenum'];
  $email=$_POST['email'];
  $sanitize_email=filter_var($email,FILTER_SANITIZE_EMAIL);
  $validate_email=filter_var($sanitize_email,FILTER_VALIDATE_EMAIL);
   $password=$_POST['password'];
  // $password= $_POST['password'];
  
  $capital_pass=preg_match("/[A-Z]/",$password);
  // $preg_match=preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password);

  $small_pass=preg_match('/[a-z]/',$password);
   $number_pass=preg_match('/[0-9]/',$password);

  if(empty($name) || empty($username) || empty($email) || empty($password)){
    $password=md5($_POST['password']);
    $errorMessage=' <li class="list-group-item list-group-item-warning">All Fields must be fulfilled</li>';
  }elseif(strlen($name)<6){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Name must be more than 6 characters</li>';

  }elseif(strlen($username)<6){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Username must be more than 6 characters</li>';
  }elseif(checkUsername($username)){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Username alredy exists</li>';
  } elseif(strlen($phonenum)<11){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Phonenumber must be atleast 11 numbers</li>';
  }elseif(!$validate_email){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Email adress invalid</li>';
  }elseif(checkEmail($validate_email)){
    $errorMessage=' <li class="list-group-item list-group-item-danger">Same email already exists.Try a different one</li>';
  }elseif(strlen($password)<8 or $capital_pass<1 or $small_pass<1 or $number_pass<1){
    $password=md5($_POST['password']);
    $errorMessage=' <li class="list-group-item list-group-item-danger">Password must be greater than 8 characters and contain 1 capital letter,1 small letter and 1 number</li>';
  }else{
  $password=md5($_POST['password']);
  $sql="INSERT INTO inserts(name,username,phonenumber,email,password)";
  $sql .="VALUES(:name,:username,:phonenum,:email,:password)";
  $stmt=$pdo->prepare($sql);
  $stmt->bindValue(':name',$name);
  $stmt->bindValue(':username',$username);
  $stmt->bindValue(':phonenum',$phonenum);
  $stmt->bindValue(':email',$email);
  $stmt->bindValue(':password',$password);
  $execute=$stmt->execute();
//1Aa
  if($execute){
    $successMessage= '<li class="list-group-item list-group-item-success">Data inserted Successfully</li>';
    // echo $successMessage;
    
  }else{
    $errorMessage="Something went wrong try again";
    // echo $errorMessage;
  }

}

}


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Insert Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container bg-warning">
        <h1 class="text-center">Registration Form</h1>
    </div>
      <div class="d-flex justify-content-center">
       <form action=""method="post">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp"name="name" placeholder="Enter your name">
                </div>
              <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" class="form-control"name="uname" id="username" placeholder="Enter your Username">
              </div>
              <div class="form-group">
                <label for="username">Phone Number</label>
                <input type="text" class="form-control"name="phonenum" id="phonenum" placeholder="Enter your Phonenumber">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email"name="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"name="password" class="form-control"id="password" placeholder="Enter your Password">
                  </div>
              <button name="submit" type="submit" class="btn btn-primary">Submit</button><br>
              <?php 
              if(isset($successMessage)){
                echo $successMessage;
              }
              ?>
              <?php
               if(isset($errorMessage)){
                echo $errorMessage;
              }
              ?>
            </form>
           
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>