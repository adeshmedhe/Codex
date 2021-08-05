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

    include 'dbconnection.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>

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

        if(!isset($_POST['email']))
            {
                header("location:forgot_password.php");
            }

    $query = "SELECT email FROM signup WHERE email='{$_POST['email']}'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {

            

            // Set the email to session variable
            $_SESSION['email'] = $_POST['email'];

            // Generate otp and save to session variable
            // from 10000 to 99999 i.e. 5 digit otp will be generated
            $otp = mt_rand(10000,99999);
            $_SESSION['otp'] = $otp;

            // Send this otp to email
            $to = "{$_POST['email']}";
            $subject = "OTP for password change" ;
            $body = "Hi, Your OTP is $otp";
            $header = "FROM: codexproject2021@gmail.com";

            if(mail($to,$subject,$body,$header))
            {
                echo '<script>
                alert("Email sent successfully!");
                 </script>';
            }
            else
            {
                echo '<script>
                alert("Error sending email!");
                 </script>';
            }

?>

 <!-- OTP FORM -->
<form class="form-horizontal" role="form" action="enter_password.php" method="POST" id="form2" >
    <h3 class="text text-center "><b>Enter OTP</b></h3>
        <div class="form-group">
            <label for="otp" class="col-sm-3 control-label">Enter OTP</label>
            <div class="col-sm-9">
                <input type="number" id="otp" name="otp" placeholder="Enter OTP" class="form-control" autofocus required>
            </div>
                 <div class="col-sm-12 text-danger text-center" id=""></div>
            </div>

        <div class="form-group">
            <div class="mx-4 text-center">
                <button type="submit" class="btn btn-primary" name="otp_check" id="otp_check">Check OTP</button>
            </div>
        </div>
</form>

<?php 
    }
    else
    {
?>
    <div class="container-fluid w-100 text-center">
        <span class="text-danger">Your Entered email is not registered</span>
        <br>
        <span class="text-danger">Please Enter the registered email only!</span>
    </div>
<?php
    }
?>


</body>
</html>