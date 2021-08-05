<?php 

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
    <title>Admin</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

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

<!-- Title -->
<!-- <div class="container-fluid bg-dark">
        <div class="row"  id="title_row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="text-center font-weight-bold display-4 text-white " id="title" >Codex</div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center my-auto py-3">
                <a href="" class="text-white btn btn-danger">LOGOUT</a>
            </div>       
        </div>
</div> -->

<div class="container-fluid bg-dark">
<!-- Title -->
        <div class="row"  id="title_row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div>
        </div>
    </div>

<!-- Display student details -->
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center h3 bg-dark text-white ">Welcome: - Admin</div>
        </div>
    </div>



<!-- Navigation bar -->
<nav class="navbar navbar-expand-md bg-light">
    <a href="#" class="navbar-brand">Menu</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigationbar" aria-expanded="false" aria-controls="navigationbar">
        <i class="fas fa-bars"></i>
    </button>

    <div id="navigationbar" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item mr-4 p-1">
                <a href="view_students.php" class="nav-link text-primary  btn"><i class="fas fa-user-circle"></i> View all students</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="scoreboard.php" class="nav-link text-success btn"><i class="fas fa-list"></i> View Scoreboard</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="logout.php" class="nav-link text-danger btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    
    </div>
</nav>

<br>

<!-- Set winner for previous question -->
<form action="set_winner.php" class="form-inline justify-content-center" method="post">
    <div class="form-group px-1">
        <input type="number" class="form-control" placeholder="Enter Student code" name="winner" id="winner">
    </div>

    <div class="form-group px-1">
        <input type="submit" value="Set Winner" name="winner_set" id="winner_set" class="form-control btn btn-success">  
    </div>
</form>
<br>


<!-- Question -->
<div class="container">
    <div class="row">
        <div class="col text-center">Question</div>
    </div>
    <div class="row">
        <textarea class="w-100 " rows="5" id="question" placeholder="Question" name="question" readonly ><?php 
                $path = "admin/question.txt";
                $question = file_get_contents($path);
                if($question != false)
                    echo $question;
                else
                    echo "Question";
            ?></textarea>
    </div>
</div>
<br>


<!-- Input and output fields -->
 <div class="container-fluid">
     <div class="row text-right">
        <div class="col-md-6 ">
            <textarea class="w-100 " rows="5" id="input" placeholder="Input1" name="text" readonly><?php 
                    $path = "admin/input1.txt";
                    $inp1 = file_get_contents($path);
                    if($inp1 != false)
                        echo $inp1;
                    else
                        echo "Input1";
                ?></textarea>
        </div>
        <div class="col-md-6">
            <textarea class="w-100 " rows="5" id="output" placeholder="Output1" name="text" readonly><?php 
                    $path = "admin/output1.txt";
                    $op1 = file_get_contents($path);
                    if($op1 != false)
                        echo $op1;
                    else
                        echo "Output1";
                ?></textarea>
        </div>
    </div>
  <br>
  
  
  <div class="row">
        <div class="col-md-6">
            <textarea class="w-100 " rows="5" id="input" placeholder="Input2" name="text" readonly><?php 
                    $path = "admin/input2.txt";
                    $inp2 = file_get_contents($path);
                    if($inp2 != false)
                        echo $inp2;
                    else
                        echo "Input2";
                ?></textarea>
        </div>
        <div class="col-md-6">
            <textarea class="w-100 " rows="5" id="output" placeholder="Output2" name="text" readonly><?php 
                    $path = "admin/output2.txt";
                    $op2 = file_get_contents($path);
                    if($op2 != false)
                        echo $op2;
                    else
                        echo "Output2";
                ?></textarea>
        </div>
    </div>
  <br>

  <div class="row">
        <div class="col-md-6">
            <textarea class="w-100 " rows="5" id="input" placeholder="Input3" name="text" readonly><?php 
                    $path = "admin/input3.txt";
                    $inp3 = file_get_contents($path);
                    if($inp3 != false)
                        echo $inp3;
                    else
                        echo "Input3";
                ?></textarea>
        </div>
        <div class="col-md-6">
            <textarea class="w-100 " rows="5" id="output" placeholder="Output3" name="text" readonly><?php 
                    $path = "admin/output3.txt";
                    $op3 = file_get_contents($path);
                    if($op3 != false)
                        echo $op3;
                    else
                        echo "Output3";
                ?></textarea>
        </div>
    </div>
<br>

<div class="container-fluid text-center">
    <a href="add_question.php" class="btn btn-primary btn-md">Add Question</a>
</div>
<br>

<div class="container-fluid ">
    <div class="row bg-dark d-flex justify-content-center">
        <p class="text text-white"> <span class="text-white bg-danger">Note:</span> Please check for extra spaces (if any)</p>
    </div>
</div>

</body>
</html>