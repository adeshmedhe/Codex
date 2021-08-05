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




$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="codex";

$question = $_POST['question'];
$inp1 = $_POST['input1'];
$op1 = $_POST['output1'];

$inp2 = $_POST['input2'];
$op2 = $_POST['output2'];

$inp3 = $_POST['input3'];
$op3 = $_POST['output3'];

$conn = mysqli_connect("localhost", "root", "", "codex");  
	
if(mysqli_connect_errno()) {  
	die("Failed to connect with Database: ". mysqli_connect_error());  
}

if(isset($_POST['set']))
{
        // write the input 1 in text file
        $path = "admin/input1.txt";
        $file = fopen($path,"w");
        fwrite($file,$inp1);
        fclose($file);

        // write the input 2 in text file
        $path = "admin/input2.txt";
        $file = fopen($path,"w");
        fwrite($file,$inp2);
        fclose($file);

        // write the input 3 in text file
        $path = "admin/input3.txt";
        $file = fopen($path,"w");
        fwrite($file,$inp3);
        fclose($file);

        // OUTPUTS

        // output 1
        $path = "admin/output1.txt";
        $file = fopen($path,"w");
        fwrite($file,$op1);
        fclose($file);

        // output 2
        $path = "admin/output2.txt";
        $file = fopen($path,"w");
        fwrite($file,$op2);
        fclose($file);

        // output 3
        $path = "admin/output3.txt";
        $file = fopen($path,"w");
        fwrite($file,$op3);
        fclose($file);

        // question
        $path = "admin/question.txt";
        $file = fopen($path,"w");
        fwrite($file,$question);
        fclose($file);

        // ------------------------------------------------ //
        // Deleting all the rows from scoreboard table
        $query = "DELETE FROM scoreboard WHERE TRUE";
        $result = mysqli_query($conn, $query);

        // Setting the submitted value to 0 in signup table
        $query1 = "UPDATE signup SET submitted = 0 ";
        $result1 = mysqli_query($conn, $query1);
        
        mysqli_close($conn);

        echo '<script>
            alert("Question set succesfully");
            window.location.replace("teacherlogin.php");
        </script>';
    }

?>
