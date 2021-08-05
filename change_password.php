<?php
    session_start();
    
    if(!isset($_POST['password']) || !isset($_SESSION['email']))
    {
        header("location:forgot_password.php");
        die();
    }
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
    $new_password = $_POST['password'];
    $email = $_SESSION['email'];

    $query = "UPDATE signup SET psw='$new_password' WHERE email='$email';";
    $result = mysqli_query($con, $query);
    if($result)
    {
        // destroying session and unsetting post 
        session_unset();
        session_destroy();
        unset($_POST);
        
        echo '<script>
        alert("Password changed successfully!");
         window.location.replace("login.php");
         </script>';
    }
    else
    {
        echo '<script>
        alert("Error changing password!");
         window.location.replace("login.php");
         </script>';
    }

?>