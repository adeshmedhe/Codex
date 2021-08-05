<!DOCTYPE html>
<html lang="en">
    <head>
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
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="css/signup.css">
        <!-- <link rel="stylesheet" type="text/css" href="http://localhost:8080/main.css" /> -->


<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

<!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

<!-- js bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>






      </head>

      <style>

            @media screen and (min-width:768px)
            {
                body{
                    background-image:url('img/login.jpg');
                    background-repeat:no-repeat;
                    background-attachment:fixed;
                    background-size:cover;
                }

                form{
                    margin: 3% auto !important;
                }
            
            }

        @media screen and (min-width:992px)
        {
                form{
                        float:right;
                        margin:3% !important;
                    }
        }
        
      </style>
   
<body>
<!-- dbsignup.php -->
       
    <form class="form-horizontal" role="form" action="dbsignup.php" method="POST" id="form" >
            <?php
                  if(isset($_GET['Error']))
                  {
            ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Error'] ?></div>
            <?php  
                    $_GET['Error'] = "";
                  }
            ?>
    
    <!-- Logo and back button -->
        <!-- <div class="col-sm-12">
            <a href="index.php" class="btn text-secondary bg-white py-3 my-3"><i class="fas fa-backward"></i> Back</a>
        </div>
        <div class="brand-wrapper text-center col-sm-12">
            <img src="assets/images/logo.svg" alt="logo" class="logo my-3" height="60px">
        </div> -->

        <!-- logo and back button-->
        <div class="container-fluid bg-dark">
        <div class="row"  id="title_row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                <img src="assets/images/logo.svg" alt="logo" class="logo text-center" height="60px">
            </div> 

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <a href="index.php" class="btn bg-white my-3 text-success btn"><i class="fas fa-backward"></i> Back</a>
            </div>    
        </div>
 </div>
        

        <h2>Signup</h2>

        <div class="form-group">
            <label for="std_code" class="col-sm-3 control-label">Student code *</label>
            <div class="col-sm-9">
                <input type="number" id="std_code" name="std_code" placeholder="Enter Student code" class="form-control" autofocus required>
            </div>
            <div class="col-sm-12 text-danger text-center" id="std_code_error"></div>
        </div>

        <div class="form-group">
            <label for="std_name" class="col-sm-3 control-label">Full Name *</label>
            <div class="col-sm-9">
                <input type="text" id="std_name" name="std_name" placeholder="Enter Student Name" class="form-control" autofocus required>
            </div>
            <div class="col-sm-12 text-danger text-center" id="std_name_error"></div>

        </div>

        <div class="form-group">
            <label for="std_email" class="col-sm-3 control-label">Email *</label>
            <div class="col-sm-9">
                <input type="email" id="std_email" name="std_email" placeholder=" Enter Email" class="form-control" required >
            </div>
            <div class="col-sm-12 text-danger text-center" id="std_email_error"></div>
        </div>

        <div class="form-group">
            <label for="college" class="col-sm-3 control-label">College Name *</label>
            <div class="col-sm-9">
                    <select name="college" id="college" class="form-control" style="height:34px;" required>
                        <option value="Dr. J. J. Magdum College of Engineering, Jaysingpur">Dr. J. J. Magdum College of Engineering, Jaysingpur</option>
                    </select>
            </div>
        </div>
        
        <div class="form-group">
                <label for="dept_name" class="col-sm-3 control-label">Department *</label>
                <div class="col-sm-9">
                    <select name="dept_name" id="dept_name" class="form-control" style="height:34px;" required>
                        <option value="Computer Science and Enginnering">Computer Science and Enginnering</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Mechanical Enginnering">Mechanical Enginnering</option>
                        <option value="Civil Enginnering">Civil Enginnering</option>
                        <option value="Electronics and Telicommunication Enginnering">Electronics and Telicommunication Enginnering</option>
                    </select>
                </div>
            </div>

        
        <div class="form-group">
            <label for="year" class="col-sm-3 control-label">Year *</label>
            <div class="col-sm-9">
                <select name="year" id="year" class="form-control" style="height:34px;" required >
                    <option value="First year">First year</option>
                    <option value="Second year">Second year</option>
                    <option value="Third year">Third year</option>
                    <option value="Last year">Last year</option>
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password *</label>
            <div class="col-sm-9">
                <input type="password" id="password" placeholder="Password" class="form-control" required name="psw">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Confirm Password *</label>
            <div class="col-sm-9">
                <input type="password" id="cpassword" placeholder="Password" class="form-control" required name="cpsw">
            </div>
            <div class="col-sm-12 text-danger text-center" id="psw_match_error"></div>

        </div>
        
            
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
                <button type="submit" class="btn btn-primary " name="register" id="register" disabled>Register</button>
            </div>
        </div>
    </form>

</body>

<script>
    $(function()
    {
        let cde ;
        let nme ;
        let mail ;
        let psw ;

// Name checking
        $("#std_name").change(function()
            {
                // nme = false;
                var name = $("#std_name").val();
                name = jQuery.trim(name);

                var regex = new RegExp("^[a-zA-Z ]+$");

                if(name.length <8)
                {
                    $("#std_name_error").text("Name should be at least 8 characters");
                }
                else{
                    if(!regex.test(name))
                        {
                            $("#std_name_error").text("Enter a valid name");
                        }
                    else{
                            // nme = true;
                            $("#std_name_error").text("");
                        }
                }
                
            })



//  Check code
        $("#std_code").on("change",function()
            {
                // cde = false;
                var code = $("#std_code").val();
                if( (code<10000) || (code > 99999))
                {
                    $("#std_code_error").text("Enter valid student code");
                }
                else{
                    // Check if the student code already exists

                        $.ajax({
                            url: "check_code.php",
                            type:"POST",
                            data: {"check_code": document.getElementById("std_code").value },
                            success: function(data)
                            {
                                $("#std_code_error").text(data);
                                if(data != "Student code already registered")
                                {
                                    // cde = true;
                                    $("#std_code_error").text("");
                                }
                            },
                        })
                }
                
            })

        // sending the mail id entered to the check_mail, which will check if the email already exists in the database
            $("#std_email").on("change",function()
            {
                // mail = false;
                $.ajax({
                    url: "check_mail.php",
                    type:"POST",
                    data: {"check_mail": document.getElementById("std_email").value },
                    success: function(data)
                    {
                        if(data == "Email already registered")
                        {
                            $("#std_email_error").text(data);
                        }
                        else
                        {
                            // mail = true;
                            $("#std_email_error").text("");
                        }
                    },
                })

            })

            
            // Checking the password and confirm password 

            $("#cpassword").on("change ",(function()
            {
                psw = false;
                if( $("#password").val() != $("#cpassword").val())
                {
                    $("#psw_match_error").text("Password not matched");
                }
                else
                {
                    psw = true;
                    $("#psw_match_error").text("");   
                }
            }))

            $("#password").on("change",(function()
            {
                psw = false;
                if( $("#password").val() != $("#cpassword").val())
                {
                    $("#psw_match_error").text("Password not matched");
                }
                else
                {
                    psw = true;
                    $("#psw_match_error").text("");
                }
            }))

            $("#form").on("change",function()
            {
                var name = $("#std_name").val();
                name = jQuery.trim(name);

                if( psw && (name.length >=8))
                    {
                        $("#register").prop("disabled",false);
                    }
                    else
                    {
                        $("#register").prop("disabled",true);

                    }
            })
                     
    })

</script>
</html>