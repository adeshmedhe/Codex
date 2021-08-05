<?php 

    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="codex";

    $conn =  mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_errno())
    {
        die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else
    {
        $query = "SELECT * FROM signup WHERE student_code='{$_POST["check_code"]}'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            echo "Student code already registered";
        }
        else
        {
            echo "";
        }
    }

?>