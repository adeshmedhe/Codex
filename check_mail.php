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
        $query = "SELECT * FROM signup WHERE email='{$_POST["check_mail"]}'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            echo "Email already registered";
        }
        else
        {
            echo "";
        }
    }

?>