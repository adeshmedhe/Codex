<?php
	$host = "localhost";  
	$user = "root";  
	$password = '';  
	$db_name = "codex";  
	
	$con = mysqli_connect($host, $user, $password, $db_name);  
	if(mysqli_connect_errno()) {  
		die("Failed to connect with MySQL: ". mysqli_connect_error());  
	}

if(isset($_POST['login']))
{
   	if(empty($_POST['email'])||empty($_POST['psw']))
	{
   		header("location:login.php?Empty=please enter the email and psw!");
	}

	else
	{
       	$query= "select * from signup where email='".$_POST['email']."'and psw='".$_POST['psw']."'";
		$query1 = "SELECT * FROM admin";
		
		//    Check if the mail is admin mail or not
		// 	  if it is admin mail then execute query1 ELSE execute query
		
		if( $_POST['email'] == "sgv9506@gmail.com")
			$result = mysqli_query($con, $query1);
		else
	   		$result = mysqli_query($con, $query);


		if( (mysqli_num_rows($result)) > 0)
		{
			$row = mysqli_fetch_assoc($result);

			if( ($_POST['email'] == $row['email'])  && ($_POST['psw'] == $row['psw']))
			{
				session_start();
				$_SESSION['user'] = $_POST['email'];
				
				if ( $_POST['email'] != "sgv9506@gmail.com")
					header("location:home.php");

				header("location:teacherlogin.php");

			}
			else
			{
				header("location:login.php?Invalid=Please Enter Correct Email and Password!");
			}
		}

		else
		{
			header("location:login.php?Invalid=Please Enter Correct Email and Password!");
		}
	}
}

mysqli_close($con);


?>