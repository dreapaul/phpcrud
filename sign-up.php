<?php
require_once('classes/database.php');
$con = new database();
 
if(isset($_POST['sign-up'])){
  $firstname = $_POST ['FirstName'];
  $lastname = $_POST ['LastName'];
  $birthday = $_POST ['birthday'];
  $sex = $_POST ['sex'];
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $confirm = $_POST ['pass2'];

if($password == $confirm) {
    if($con->signup($firstname, $lastname, $birthday, $sex,$username, $password)){
        header('location:login.php');
} else {
    echo 'Usename already exist';
}
  
    } else {
        echo 'Password did not match';
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;                                                                                               
    }
    </style>
</head>
<body>
 
<div class="container-fluid login-container">
  <h2 class="text-center mb-4">Sign Up</h2>
  <form method="post">

    <div class="form-group">

    <div class="form-group">
      <label for="Firstname">First Name:</label>
      <input type="text" class="form-control" name="FirstName" placeholder="First Name" >
    </div>

    <div class="form-group">
      <label for="Lastname">Last Name:</label>
      <input type="text" class="form-control" name="LastName" placeholder="Last Name" >
    </div>


    <div class="mb-3">
      <label for="birthday" class="form-label">Birthday:</label> 
      <input type="date" class="form-control" name="birthday"> 
  </div> 
  
  <div class="mb-3"> <label for="sex" class="form-label">Sex:</label>
   <select class="form-select" name="sex"> 
    <option selected disabled>Select Sex</option> 
    <option value="male">Male</option> 
    <option value="female">Female</option> 
  </select> 
</div>

      <label for="username">Username:</label>
      <input type="text" class="form-control" name="user" placeholder="Enter your name" >
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="pass" placeholder="Enter password">
    </div>

    <div class="form-group">
      <label for="password">Confirm Password:</label>
      <input type="password" class="form-control" name="pass2" placeholder="Enter password">
    </div>

    <div class="container">
    <div class= "row gx-1">

   
    <div class="col"><input type="submit" value="Sign-up" class="btn btn-danger btn-block" name="sign-up">
  </form></div>
    </div>
    </div>
</div>
 
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
 