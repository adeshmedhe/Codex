<!-- Set winner -->

<?php 

// Only admin can acces this page
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
// ///////////////////////////////////////////////

    if(isset($_POST['winner_set']))
    {
        $winner = $_POST['winner'];
        $conn = mysqli_connect("localhost","root","","codex");
        if(mysqli_connect_errno()) 
        {  
            echo "Failed to set winner";
            die();  
        }

        $query = "UPDATE admin set winner={$winner} WHERE id=1";
        $result = mysqli_query($conn, $query);

        echo '<script>
            alert("Winner set succesfully");
            window.location.replace("teacherlogin.php");
        </script>';
    }

?>



