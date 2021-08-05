<?php

//  Not accessible to the admin, only accessible to the students
session_start();

if(!isset($_SESSION["user"]))
{
    header("location:login.php");
}
else
{
    $user = $_SESSION['user'];
    if( $user == "sgv9506@gmail.com")
    {
        header("location:teacherlogin.php");
    }
}



// Deleting record
include 'dbconnection.php';

if(isset($_POST["delete"]))
{
    $sql = "DELETE FROM signup WHERE email='{$_SESSION['user']}'";

        if (mysqli_query($con, $sql)) 
        {
            // Profile is deleted, so we have to unset and destroy the sessions
            session_start();
            session_unset();
            session_destroy();

            echo '<script>
                alert("Record deleted succesfully");
                window.location.replace("login.php");
            </script>';
        }
        else
        {
            echo '<script>
                alert("Error deleting record");
                window.location.replace("profile.php");
            </script>';
        }

    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="assets/css/signup.css">
        <link rel="stylesheet" type="text/css" href="http://localhost:8080/main.css" />

        <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

</head>
<body>

<div class="container-fluid bg-dark">
<!-- Title -->
        <div class="row"  id="title_row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div> 

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <a href="home.php" class="btn bg-white my-3 text-success btn"><i class="fas fa-backward"></i> Back</a>
            </div>  
            
        </div>
 </div>
    
<div class="container">
  <form class="form-horizontal" role="form" action="" method="POST">
      <h2 class="text-center">Profile</h2>

        <?php
            $sql="SELECT * FROM signup WHERE email='{$_SESSION["user"]}'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result)){
        ?>

          <div class="form-group">
             <label for="std_code" class="col-sm-3 control-label">Student code:</label>
                 <div class="col-sm-9">
                   <h5><?php echo $row['student_code'] ?></h5>
                 </div>
          </div>


      <div class="form-group">
          <label for="std_name" class="col-sm-3 control-label">Full Name:</label>
          <div class="col-sm-9">
             <h5><?php echo $row['name'] ?></h5>
          </div>
      </div>


      <div class="form-group">
          <label for="std_email" class="col-sm-3 control-label">Email:</label>
          <div class="col-sm-9">
            <h5><?php echo $row['email'] ?></h5>
          </div>
      </div>

       <div class="form-group">
          <label for="college" class="col-sm-3 control-label">College Name:</label>
          <div class="col-sm-9">
              <h5><?php echo $row['college'] ?></h5>
           </div>
      </div>
      
      <div class="form-group">
          <label for="dept_name" class="col-sm-3 control-label">Department:</label>
          <div class="col-sm-9">
            <h5><?php echo $row['department'] ?></h5>
          </div>
      </div>
      
      <div class="form-group">
          <label for="year" class="col-sm-3 control-label">Year:</label>
          <div class="col-sm-9">
              <h5> <?php echo $row['class'] ?></h5>
          </div>      
      </div> <!-- /.form-group -->
      

        <?php
                }
            }
      ?>
    
     
    <div class="form-group">
        <a href="updatepro.php" name="submit" class="btn btn-primary btn-block">Update profile</a>
            <br>
        <button name="delete" class="btn btn-primary btn-block"> Delete profile</button>
    </div>

  </form> <!-- /form -->
</div> <!-- ./container -->
    
</body>
</html>