<?php


// If the session is already set and
//  if the user is admin then goto teacherlogin.php
// or if the user is student then goto home.php

// session_start();

// if(isset($_SESSION["user"]))
// {
//   header("location:home.php");
// }

// else
// {
//     $user = $_SESSION['user'];
//     if( user == "sgv9506@gmail.com")
//     {
//         header("location:teacherlogin.php");
//     }
//     else
//     {
//         header("location:home.php");
//     }
// }

?>










<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <!-- <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="css/login.css">

  <!-- --------------------------------------------------------- -->
<!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

<!-- js bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<div class="container-fluid bg-dark">
<!-- Title -->
        <div class="row"  id="title_row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div> 

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <a href="index.php" class="btn bg-white my-3 text-success "><i class="fas fa-backward"></i> Back</a>
            </div>  
            
        </div>
 </div>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="img/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <?php
                  if(@$_GET['Empty']==true)
                  {
                ?>
              <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                <?php    
                  }
              ?>
              <?php
                  if(@$_GET['Invalid']==true)
                  {
                ?>
              <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                <?php    
                  }
              ?>
              <form action="dblogin.php" method="POST">
             
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="psw" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                  
                  </form>
                <a href="forgot_password.php" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="signup.php" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
