<?php 

// Accessible only to teachers

session_start();
if( !isset($_SESSION['user']))
{
    header("location:login.php");
}
else
{
    $user = $_SESSION['user'];
    if( $user != "sgv9506@gmail.com")
    {
        header("location:home.php");
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Students</title>
    
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- js bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- Css file -->
    <link rel="stylesheet" href="css/style.css">

    <script src="js/lib/ace.js"></script>
    <script src="js/lib/theme-monokai.js"></script>
    <script src="js/ide.js"></script>

</head>

<body>

<div class="container-fluid bg-dark">
<!-- Title -->
        <div class="row"  id="title_row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col text-center h3 bg-dark text-white ">Welcome: - Admin</div>
        </div>
    </div>

<!-- View profile and logout button -->
<nav class="navbar navbar-expand-md bg-light">
    <a href="#" class="navbar-brand">Menu</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigationbar" aria-expanded="false" aria-controls="navigationbar">
        <i class="fas fa-bars"></i>
    </button>

    <div id="navigationbar" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item mr-4 p-1">
                <a href="teacherlogin.php" class="nav-link text-primary  btn"><i class="fas fa-home"></i></i> Home</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="scoreboard.php" class="nav-link text-success btn"><i class="fas fa-list"></i> View Scoreboard</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="logout.php" class="nav-link text-danger btn"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
        </ul>
    
    </div>
</nav>
<br>

<!-- Student details -->
<div class="container" style="overflow-x:auto">
<br><br>
<h1 class="text-warning text-center">Student Data</h1><br><br>
        <table name='student_table' id="student_table" class="table table-bordered table-hover" >
            <thead >
                <tr class="bg-dark text-white text-center">
                <th>ID</th> 
                <th>Student code</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Department</th>
                <th>Year</th>
                <th>Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php
                include 'dbconnection.php';
                $sql= "SELECT * FROM signup";

                $query=mysqli_query($con,$sql);

                while($result = mysqli_fetch_array($query)){

              
          ?>
                <tr class="text-center">
                <td><?php echo $result['id']?></th> 
                <td><?php echo $result['student_code']?></td>
                <td><?php echo $result['name']?></td>
                <td><?php echo $result['email']?></td>
                <td><?php echo $result['college']?></td>
                <td><?php echo $result['department']?></td>
                <td><?php echo $result['class']?></td>
                <td><button class="btn-danger btn"><a href="delete.php?id=<?php echo $result['id']?>" class="text-white">Delete</a></a></button></td>
                </tr>
          <?php  } ?>
               
            </tbody>

        </table>

</div>

</body>
</html>