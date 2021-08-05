<?php
    session_start();

if(isset($_POST['submit']))
{
    include 'dbconnection.php';

    $query = "SELECT student_code, name, department, class, college FROM signup WHERE email = '{$_SESSION["user"]}'";
    // echo $query;
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    { 
        // echo "Inside if";
        $row = mysqli_fetch_assoc($result);
        
            date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $datetime = $date->format("Y-m-d H:i:s");

            $student_code = $row['student_code'];
            $name = $row['name'];
            $department = $row['department'];
            $class = $row['class'];
            $college = $row['college'];
            $score = $_SESSION['score'];

            $qry = "INSERT INTO scoreboard VALUES ( $student_code, '$name', '$department', '$class', $score, '$datetime', '$college')";
            // echo $qry;
            $result = mysqli_query($con, $qry);
            
        
    }

    $qry2 = "UPDATE signup SET submitted=1 WHERE email='{$_SESSION["user"]}'";
    // echo $qry2;
    $result2 = mysqli_query($con, $qry2);

    mysqli_close($con);

    echo '<script>
            alert("Submitted successfully;")
        </script>';

    header("location:home.php");
    
}

?>

