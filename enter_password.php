<?php 
    session_start();
    
    if(isset($_SESSION['user']))
    {
        // if the user is logged in then tell the user to logout first
        // Redirect them to home page
        echo '<script>
            alert("First Logout and then try to change password");
            window.location.replace("home.php");
        </script>';   
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Student Registration</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/signup.css">
    
<!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

<!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

<!-- js bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Css file -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>

<!-- logo and back button-->
<div class="container-fluid bg-dark">
            <div class="row"  id="title_row" >
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                    <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
                </div> 

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                    <a href="login.php" class="btn bg-white my-3 text-success btn"><i class="fas fa-backward"></i> Back</a>
                </div>    
            </div>
     </div>

<br><br>

<?php
    if(!isset($_POST['otp']) || !isset($_SESSION['otp']))
    {
        header("location:forgot_password.php");
    }

    $otp = $_SESSION['otp'];
    $OTP = $_POST['otp'];
    if($otp == $OTP)
    {
?>

<form class="form-horizontal" role="form" action="change_password.php" method="POST" id="form3" >
   <h3 class="text text-center "><b>Enter new password</b></h3>
       <div class="form-group">
           <label for="password" class="col-sm-3 control-label">Enter new password</label>
           <div class="col-sm-9">
               <input type="text" id="password" name="password" placeholder="Enter Password" class="form-control" autofocus required>
           </div>
           <div class="col-sm-12 text-danger text-center" id=""></div>
       </div>

       <div class="form-group">
           <div class="mx-4 text-center">
               <button type="submit" class="btn btn-primary" name="change_password" id="change_password">Change Password</button>
           </div>
       </div>
</form>

<?php 
    }
    else
    {
?>
    <div class="container-fluid w-100 text-center">
        <span class="text-danger">OTP not matched, Please try again</span>
    </div>

<?php
    }
?>



</body>
</html>