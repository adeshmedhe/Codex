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


    include 'dbconnection.php';

    $id=$_GET['id'];
    $query="DELETE  FROM signup WHERE id=$id";
    
    if( mysqli_query($con,$query))
    {
        echo '<script>
             alert("Record deleted successfully!");
             window.location.replace("view_students.php");
                </script>';
    }
    else
    {
        echo '<script>
        alert("Error deleting record!");
        window.location.replace("view_students.php");
           </script>';

    }      
?>

