<?php

$student_code = $_POST['std_code'];
$name = $_POST['std_name'];
$email= $_POST['std_email'];
$college = $_POST['college'];
$department= $_POST['dept_name'];
$class =$_POST['year']; 
$psw = $_POST['psw'];


if(!empty($student_code)||!empty($name)||!empty($email)||!empty($college)||
!empty($department)||!empty($class)||!empty($psw)){
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="codex";

    $conn = new mysqli($host, $dbUsername,$dbPassword,$dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT="SELECT student_code from signup where student_code=? limit 1";
        $INSERT="INSERT INTO signup(student_code,name,email,college,department,class,psw)
                  VALUES (?,?,?,?,?,?,?)";
            

         $stmt= $conn->prepare($SELECT);
         $stmt->bind_param("s",$student_code);
         $stmt->execute();
         $stmt->bind_result($student_code);
         $stmt->store_result();
         $rnum=$stmt->num_rows;
         
         // student code check
         if($rnum==0)
         {
             $stmt->close();
             
             // email check
             $qry = "SELECT student_code from signup where email=? limit 1";
             $statement = $conn->prepare($qry);
             $statement->bind_param("s",$email);
             $statement->execute();
             $statement->bind_result($email);
             $statement->store_result();
             $rows = $statement->num_rows;

             if($rows == 0)
             {
                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssssss",$student_code,$name,$email,$college,$department,$class,$psw);
             
                $stmt->execute();
                echo 
                '<script>
                    alert("Account created successfully");
                </script>';
                header("location:login.php");
             }
             else
             {
                 header("location:signup.php?Error=Email already registered");
             }
             
             $statement->close();
         }
         else{
             header("location:signup.php?Error=Student code already exists");
         }
         $stmt->close();
         $conn->close();
    }
    

}else{
    // Already checking is done
    echo"All feild are required";
    die();
}

?>
