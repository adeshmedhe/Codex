<?php

// Accessible only to the students and not the admin

    session_start();

    if(!isset($_SESSION['user']))
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

    include 'dbconnection.php';

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    
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



</head>
<body>

    <!-- Title -->
    <div class="container-fluid bg-dark">
        <div class="row"  id="title_row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div>
        </div>
    </div>

<!-- Display student details -->
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center h3 bg-dark text-white "><?php 
                $query = "SELECT name FROM signup WHERE email='{$_SESSION['user']}'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                echo "Welcome : ".$row['name'];
            
            ?></div>
        </div>
    </div>


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
                <a href="scoreboard.php" class="nav-link text-success btn"><i class="fas fa-list"></i>    View Scoreboard</a>
            </li>

            <li class="nav-item mr-4 p-1">
                <a href="logout.php" class="nav-link text-danger btn"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
        </ul>
    
    </div>
</nav>


<br>
<!-- Previous question winner -->
<div class="container-fluid">
    <div class="row">
        <div class="col">Winner of previous question: </div>
    </div>
    <div class="row">
        <?php 
             $qry = "SELECT signup.name, signup.department, signup.class FROM signup,admin WHERE student_code = admin.winner;";
             $result = mysqli_query($con, $qry);
             if(mysqli_num_rows($result) > 0)
             {
                 $row = mysqli_fetch_assoc($result);
        ?>
                <div class="col-lg-4 col-md-4 col-sm-12">Name :<b> <?php echo $row['name']; ?> </b></div>
                <div class="col-lg-4 col-md-4 col-sm-12">Department :<b> <?php echo $row['department']; ?> </b></div>
                <div class="col-lg-4 col-md-4 col-sm-12">Year :<b> <?php echo $row['class']; ?> </b></div>
        <?php }else
             { ?>
                <div class="col-lg-4 col-md-4 col-sm-12">Name :  <b>UNKNOWN</b></div>
                <div class="col-lg-4 col-md-4 col-sm-12">Department : <b>UNKNOWN</b></div>
                <div class="col-lg-4 col-md-4 col-sm-12">Year : <b> UNKNOWN </b> </div>
        <?php } ?>

    </div>
</div>

<br>
<!-- Coding Question -->
<div class="container">
    <div class="row">
        <div class="col text-center"> <b> Today's Question </b> </div>
    </div>
    <div class="row">
        <textarea name="question" id="question" rows="7" class="w-100 bg-dark text-white" readonly><?php
            $path = "admin/question.txt";
            $question = file_get_contents($path);
            if( $question != false)
                echo "Q. ".$question;
            else
                echo "No question for today";
        ?></textarea>
    </div>
</div>

<br>
<br>
    <!-- IDE -->
<div class="container-fluid">
    <!-- Control panel -->
    <div class="row">
        <div class="col">
            <div class="control-panel">
            <b>Select Language </b> 
            &nbsp; &nbsp;
            <select name="languages" id="languages" onchange="changeLanguage()">
                <option value="c">C</option>
                <option value="cpp">C++</option>
                <option value="py">Python</option>
                <option value="php">PHP</option>
                <option value="js">Node JS</option>
            </select>
            </div>
        </div>
    </div>
    
    <!-- Editor -->
    <div class="row">
        <div class="col">
            <div class="editor" id="editor"></div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="button-container">
                    <button class="btn btn-success"  id="run" name="run" onclick="executeCode()" > Run </button>
            </div>
        </div>
    </div>
<!-- onclick="executeCode()" -->
    

    <!-- <div class="row">
        <div class="col" class="w-75">
            <label>STDIN</label>
            <textarea name="stdin" id="stdin" rows="5" class="w-100"></textarea>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col" class="w-75">
            <label>OUTPUT</label>
            <textarea name="output" id="stdin" rows="5" class=" output w-100" readonly></textarea>
        </div>
    </div> -->

</div>
   
<br>
<!-- --------------------------------------------------------------------------------------------------------------------------- -->
<hr>

<!-- Standard inputs -->
<div class="container-fluid">
    <p class="text text-center"><b>Standard Inputs</b></p>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12  text-center ">
            <textarea name="inp_1" id="inp_1"  rows="10" class="w-75" readonly><?php 
                    $path = "admin/input1.txt";
                    $op1 = file_get_contents($path);
                    if($op1 != false)
                        echo $op1;
                    else
                        echo "Input1";
                ?></textarea> <br>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center ">
            <textarea name="inp_2" id="inp_2"  rows="10" class="w-75" readonly><?php 
                    $path = "admin/input2.txt";
                    $op2 = file_get_contents($path);
                    if($op2 != false)
                        echo $op2;
                    else
                        echo "Input2";
                ?></textarea> <br>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center ">
            <textarea name="inp_3" id="inp_3" rows="10" class="w-75" readonly><?php 
                    $path = "admin/input3.txt";
                    $op3 = file_get_contents($path);
                    if($op3 != false)
                        echo $op3;
                    else
                        echo "Input3";
                ?></textarea> <br>
        </div>

    </div>
</div>

<br>
<hr>

<!-- Expected outputs -->
<div class="container-fluid">
<p class="text text-center"><b>Expected Output</b></p>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12  text-center ">
            <textarea name="Exp_Op_1" id="Exp_Op_1"  rows="10" class="w-75" readonly><?php 
                    $path = "admin/output1.txt";
                    $op1 = file_get_contents($path);
                    if($op1 != false)
                        echo $op1;
                    else
                        echo "Output1";
                ?></textarea> <br>
            <!-- <div id="test1_result" name="test1_result" class="border d-inline text-white ">Test Case 1</div> -->
        </div>
<!-- ======================== -->
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center ">
            <textarea name="Exp_Op_2" id="Exp_Op_2"  rows="10" class="w-75" readonly><?php 
                    $path = "admin/output2.txt";
                    $op2 = file_get_contents($path);
                    if($op2 != false)
                        echo $op2;
                    else
                        echo "Output2";
                ?></textarea> <br>
            <!-- <div id="test2_result" name="test2_result" class="border d-inline text-white">Test Case 2</div> -->
        </div>

<!-- ============================ -->
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center ">
            <textarea name="Exp_Op_3" id="Exp_Op_3" rows="10" class="w-75" readonly><?php 
                    $path = "admin/output3.txt";
                    $op3 = file_get_contents($path);
                    if($op3 != false)
                        echo $op3;
                    else
                        echo "Output3";
                ?></textarea> <br>
            <!-- <div id="test3_result" name="test3_result" class="border d-inline text-white " >Test Case 3</div> -->
        </div>

    </div>
</div>

<br>

<div class="container-fluid ">
    <div class="row d-flex justify-content-center">
        <form action="submit.php" method="post" class="text-center">
            <button type="submit" class="btn btn-success " id="submit" name="submit"
            <?php 
                    $qry = "SELECT submitted from signup where email= '{$_SESSION["user"]}'";
                    $result = mysqli_query($con,$qry);
                    $row = mysqli_fetch_assoc($result);

                    if($row['submitted'])
                    {
                        echo 'disabled >Submit</button>';
                        echo '<div class="col-sm-12 text-danger text-center">You have already submitted the answer</div>';
                    }
                    else
                    {
                        echo ">Submit</button>";
                    }
                ?>
        </form>
    </div>
</div>
<br><br>

<div class="container-fluid ">
    <div class="row bg-dark d-flex justify-content-center">
        <p class="text text-white"> <span class="text-white bg-danger">Note:</span> If your answer isn't matching then please check for extra spaces (if any)</p>
    </div>
</div>


<!--   script  -->
    <script src="js/lib/ace.js"></script>
    <script src="js/lib/theme-monokai.js"></script>
    <script src="js/ide.js"></script>

</body>
</html>