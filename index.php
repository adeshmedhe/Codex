<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    
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
    
    <!-- Title -->
<div class="container-fluid bg-dark">
        <div class="row"  id="title_row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                    <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div> 

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                 <nav class="navbar navbar-expand-md ">
                     <a href="#" class="navbar-brand d-lg-none d-md-none">Menu</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigationbar" aria-expanded="false" aria-controls="navigationbar">
                        <i class="fas fa-bars "></i>
                    </button>

                    <div id="navigationbar" class="collapse navbar-collapse">
                        <ul class="navbar-nav mx-auto ">
                            <li class="nav-item mr-1 p-1 bg-light">
                                <a href="login.php" class="nav-link text-success btn"><i class="fas fa-sign-in-alt"></i> Log-In</a>
                            </li>

                            <li class="nav-item mr-1 p-1 bg-light">
                                <a href="signup.php" class="nav-link text-primary btn"><i class="fas fa-user-plus"></i> Sign UP</a>
                            </li>
                        </ul>
                    
                    </div>
                </nav>                
            </div>  
        </div>
 </div>

 <br>
 
    <!-- IDE -->
<div class="container-fluid">
    <!-- Control panel -->
    <div class="row">
        <div class="col">
            <div class="control-panel">
            Select Language  
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
                <button class="btn btn-success" onclick="executeCode()"> Run </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col" class="w-75">
            <label>STDIN</label>
            <textarea name="stdin" id="stdin" rows="5" class="w-100"></textarea>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col" class="w-75">
            <label>OUTPUT</label>
            <textarea name="output" id="output" rows="5" class="output w-100" readonly></textarea>
        </div>
    </div>

</div>
<br>

</body>
</html>