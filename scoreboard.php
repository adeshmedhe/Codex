<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'dbconnection.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

<!-- js bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                <div class="col offset-4-r text-center h3 bg-dark text-white "><?php 
                    if($_SESSION['user'] != "sgv9506@gmail.com")
                    {

                        $query = "SELECT name FROM signup WHERE email='{$_SESSION['user']}'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Welcome : ".$row['name'];
                    }
                    else
                    {
                        echo "Welome : Admin";
                    }  
                ?></div>
            </div> 

            <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <a href="home.php" class="btn bg-white my-4 text-success btn"><i class="fas fa-backward"></i> Back</a>
            </div>   -->
            
        </div>
 </div>

<!-- Display student details -->
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col offset-4-r text-center h3 bg-dark text-white "><?php 
                // $query = "SELECT name FROM signup WHERE email='{$_SESSION['user']}'";
                // $result = mysqli_query($con, $query);
                // $row = mysqli_fetch_assoc($result);
                // echo "Welcome : ".$row['name'];
            
            ?></div>
        </div>
    </div> -->

<!-- View profile, view scoreboard, logout -->
<nav class="navbar navbar-expand-md bg-light">
    <a href="#" class="navbar-brand">Menu</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigationbar" aria-expanded="false" aria-controls="navigationbar">
        <i class="fas fa-bars"></i>
    </button>

    <div id="navigationbar" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item mr-4 p-1">
                <a href="profile.php" class="nav-link text-primary  btn"><i class="fas fa-user-circle"></i> View Profile</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="home.php" class="nav-link text-success btn"><i class="fas fa-home"></i> Home</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="logout.php" class="nav-link text-danger btn"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
        </ul>
    
    </div>
</nav>
<br>

<div class="container" style="overflow-x:auto">
        <table name='student_table' id="student_table" class="table table-bordered table-hover" >
            <thead >
                <tr>
                    <th>Student Code</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Class</th>
                    <th>College</th>
                    <th>Date</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $query = "SELECT * FROM scoreboard ORDER BY score DESC,date;";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                
                ?>
                <tr>
                    <td> <?php echo $row['student_code'];  ?> </td>
                    <td> <?php echo $row['name'];  ?> </td>
                    <td> <?php echo $row['department'];  ?> </td>
                    <td> <?php echo $row['class'];  ?> </td>
                    <td> <?php echo $row['college'];  ?> </td>
                    <td> <?php echo $row['date'];  ?> </td>
                    <td> <?php echo $row['score'];  ?> </td>
                </tr>

                <?php 
                        }
                    }
                    mysqli_close($con);
                ?>

            </tbody>

        </table>

</div>

</body>
</html>