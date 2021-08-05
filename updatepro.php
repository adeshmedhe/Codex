<?php
session_start();

if(!isset($_SESSION["user"]))
{
    header("location:login.php");
}

include 'dbconnection.php';

if (isset($_POST["submit"]))
{
    $student_code = $_POST['std_code'];
    $name = $_POST['std_name'];
    $email= $_POST['std_email'];
    $college = $_POST['college'];
    $department= $_POST['dept_name'];
    $class =$_POST['year'];

    $user = $_SESSION['user'];

    $qry = "SELECT psw FROM signup WHERE email = '$user'";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_assoc($result);
    $psw = $row['psw'];


    if(!empty($student_code)||!empty($name)||!empty($email)||!empty($college)||
!empty($department)||!empty($class)||!empty($psw)){
 
    $sql= "UPDATE signup SET student_code='$student_code',name='$name',email='$email',college='$college',department='$department',class='$class',psw='$psw' WHERE email='".$_SESSION['user']."'";
    // echo $sql;
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo '<script>
           alert("Profile updated!");
            window.location.replace("profile.php");
            </script>';      
    }
    else 
    {
        echo "<script>
            alert('Profile  can not updated!');
            </script>";
        // echo $con->error;
    }
}
else{
    echo "<script>alert('plz fill up all feild ');</script>";
}
}
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width ,initial-scale=1.0">
   <title>Profile Update Page</title>
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
              <a href="profile.php" class="btn bg-white my-3 text-success btn"><i class="fas fa-backward"></i> Back</a>
            </div>  
            
        </div>
 </div> 
    
<div class="container text-center">
  <form class="form-horizontal" role="form" action="" method="POST">
      <h2>Profile</h2>
      <br>
      <?php
         $sql="SELECT * FROM  signup WHERE email='{$_SESSION["user"]}'";
         $result=mysqli_query($con,$sql);
         if(mysqli_num_rows($result)>0)
         {
             while($row=mysqli_fetch_assoc($result)){
        ?>
          
        <div class="form-group">
          <label for="std_code" class="col-sm-3 control-label">Student code</label>
          <div class="col-sm-9">
              <input type="text" id="std_code" name="std_code"  class="form-control" autofocus value="<?php echo $row['student_code'] ?>" required>
          </div>
        </div>
      
        <div class="form-group">
          <label for="std_name" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-9">
              <input type="text" name="std_name" id="std_name"  class="form-control" autofocus value="<?php echo $row['name'] ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="std_email" class="col-sm-3 control-label">Email </label>
            <div class="col-sm-9">
              <input type="email" id="std_email" name="std_email"  class="form-control" value="<?php echo $row['email'] ?>" required>
            </div>
        </div>

        <div class="form-group">
          <label for="college" class="col-sm-3 control-label">College Name:</label>
            <div class="col-sm-9">
                <select name="college" id="college" class="form-control"  required style="height:34px;">
                    <option value="Dr. J. J. Magdum College of Enginnering, Jaysingpur">Dr. J. J. Magdum College of Enginnering, Jaysingpur</option>
                </select>
            </div>
        </div>
      
        <div class="form-group">
            <label for="dept_name" class="col-sm-3 control-label">Department </label>
            <div class="col-sm-9">
                <select name="dept_name" id="dept_name" class="form-control" required style="height:34px;">
                    <option value="Computer Science and Enginnering"  <?php if($row['department'] == 'Computer Science and Enginnering'): ?> selected="selected"<?php endif; ?>   >Computer Science and Enginnering</option>
                    <option value="Information Technology"  <?php if($row['department'] == 'Information Technology'): ?> selected="selected"<?php endif; ?>  >Information Technology</option>
                    <option value="Mechanical Enginnering"  <?php if($row['department'] == 'Mechanical Enginnering'): ?> selected="selected"<?php endif; ?>  >Mechanical Enginnering</option>
                    <option value="Civil Enginnering"  <?php if($row['department'] == 'Civil Enginnering'): ?> selected="selected"<?php endif; ?>  >Civil Enginnering</option>
                    <option value="Electronics and Telicommunication Enginnering"  <?php if($row['department'] == 'Electronics and Telicommunication Enginnering'): ?> selected="selected"<?php endif; ?>  >Electronics and Telicommunication Enginnering</option>
                </select>
            </div>
        </div>
      
        <div class="form-group">
          <label for="year" class="col-sm-3 control-label">Year</label>
            <div class="col-sm-9">
                <select name="year" id="year" class="form-control"  required style="height:34px;">
                    <option value="First year" <?php if ($row['class']== "First year" ):  ?> selected="selected" <?php endif; ?> >First year</option>
                    <option value="Second year" <?php if ($row['class']== "Second year" ):  ?> selected="selected" <?php endif; ?> >Second year</option>
                    <option value="Third year" <?php if ($row['class']== "Third year" ):  ?> selected="selected" <?php endif; ?> >Third year</option>
                    <option value="Last year" <?php if ($row['class']== "Last year" ):  ?> selected="selected" <?php endif; ?> >Last year</option>
                </select>
            </div>
        </div>
      
      <!-- <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password*</label>
          <div class="col-sm-9">
              <input type="password" name="password" id="password"  class="form-control"value="<?php echo $row['psw'] ?>" required>
          </div>
      </div>

      <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
          <div class="col-sm-9">
              <input type="password" id="password" placeholder="Password" class="form-control">
          </div>
      </div> -->

             <?php
         }
        }
      ?>      
      
      <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
              <span class="help-block">*Required fields</span>
          </div>
      </div>

    <button type="submit" name="submit"class="btn btn-primary btn-block">Update profile</button>
  </form> <!-- /form -->
</div> <!-- ./container -->


</body>
</html>