
<?php

    //  Accessible only to the admin
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
    <title>Add Question</title>
    
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
<div class="container-fluid bg-dark">
        <div class="row"  id="title_row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div> 

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <a href="teacherlogin.php" class="btn bg-white my-3 text-success btn"><i class="fas fa-backward"></i> Back</a>
            </div>  
            
        </div>
 </div>
<br>

<form action="db_add_question.php" method="post">
    <!-- Question -->
        <div class="container">
            <div class="row">
                <div class="col text-center">Question</div>
            </div>
            <div class="row">
                <textarea class="w-100 " rows="5" id="question" placeholder="Question" name="question" ></textarea>
            </div>
        </div>
        <br>


        <!-- Input and output fields -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="input" placeholder="Input1" name="input1"></textarea>
                </div>
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="output" placeholder="Output1" name="output1"></textarea>
                </div>
            </div>
        <br>
        
        
        <div class="row">
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="input" placeholder="Input2" name="input2"></textarea>
                </div>
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="output" placeholder="Output2" name="output2"></textarea>
                </div>
            </div>
        <br>

        <div class="row">
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="input" placeholder="Input3" name="input3"></textarea>
                </div>
                <div class="col-md-6">
                    <textarea class="w-100 " rows="5" id="output" placeholder="Output3" name="output3"></textarea>
                </div>
            </div>
        <br>

        <div class="container-fluid text-center">
            <input type="submit" value="Set Question" id="set" name="set" class="btn btn-primary btn-lg">
        </div>
        <br>

    </form>


<div class="container-fluid ">
    <div class="row bg-dark d-flex justify-content-center">
        <p class="text text-white"> <span class="text-white bg-danger">Note:</span> Please check for extra spaces (if any)</p>
    </div>
</div>
 
</body>

</html>