<?php
    
    session_start();

    
    $_SESSION['TC1'] = false;
    $_SESSION['TC2'] = false;
    $_SESSION['TC3'] = false;
    $_SESSION['score'] = 0;

    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    if(isset($_POST['stdin']))
        $stdin = $_POST['stdin'];

    $random = substr(md5(mt_rand()),0,7);

    // Writing the program
    $filepath = "temp/".$random.".".$language; 
    $programfile = fopen($filepath,"w");
    fwrite($programfile, $code);
    fclose($programfile); 
    
    if(isset($_POST['stdin']))
    {
        // write the stdin text file
        $path = "temp/".$random.".txt";
        $file = fopen($path,"w");
        fwrite($file,$stdin);
        fclose($file);
    }

    $output = 0;

    // Get the 3 standard output file's data for comaparison
    $stdop1 = file_get_contents("admin/output1.txt");
    $stdop2 = file_get_contents("admin/output2.txt");
    $stdop3 = file_get_contents("admin/output3.txt");

    // Path for the three input files
    $p1 = "admin/input1.txt";
    $p2 = "admin/input2.txt";
    $p3 = "admin/input3.txt";

    $output1 = 0;
    $output2 = 0;
    $output3 = 0;

    if($language == "php")
    {
        if(isset($_POST['stdin']))
            $output = shell_exec("php $filepath < $path 2>&1");

        $output1 = shell_exec("php $filepath < $p1 2>&1");
        $output2 = shell_exec("php $filepath < $p2 2>&1");
        $output3 = shell_exec("php $filepath < $p3 2>&1");
        // echo $output;
    }

    if($language == 'py')
    {
        if(isset($_POST['stdin']))
            $output = shell_exec("python $filepath < $path 2>&1");

        $output1 = shell_exec("python $filepath < $p1 2>&1");
        $output2 = shell_exec("python $filepath < $p2 2>&1");
        $output3 = shell_exec("python $filepath < $p3 2>&1");
        // echo $output;
    }

    if($language == "js")
    {
        // rename($filepath, $filepath."js");
        if(isset($_POST['stdin']))
            $output = shell_exec("node $filepath < $path 2>&1");

        $output1 = shell_exec("node $filepath < $p1 2>&1");
        $output2 = shell_exec("node $filepath < $p2 2>&1");
        $output3 = shell_exec("node $filepath < $p3 2>&1");
        // echo $output;
    }

    if($language == "c")
    {
        $outputExe = $random.".exe";
        shell_exec("C:\MinGW\bin\gcc $filepath -o ./temp/$outputExe"); 
        if(isset($_POST['stdin']))
            $output = shell_exec(__DIR__."./temp/$outputExe < $path"); 

        $output1 = shell_exec(__DIR__."./temp/$outputExe < $p1"); 
        $output2 = shell_exec(__DIR__."./temp/$outputExe < $p2"); 
        $output3 = shell_exec(__DIR__."./temp/$outputExe < $p3"); 
        // echo $output;
    }

    if($language == "cpp")
    {
        $outputExe = $random.".exe";
        shell_exec("C:\MinGW\bin\g++ $filepath -o ./temp/$outputExe"); 
        if(isset($_POST['stdin']))
            $output = shell_exec(__DIR__."./temp/$outputExe < $path"); 

        $output1 = shell_exec(__DIR__."./temp/$outputExe < $p1"); 
        $output2 = shell_exec(__DIR__."./temp/$outputExe < $p2"); 
        $output3 = shell_exec(__DIR__."./temp/$outputExe < $p3"); 
        // echo $output;
    }



// --------------------------------------------------------------------------------------------------------------------------------------------------------
// Trimming thr outputs
    $output1 = trim($output1);
    $stdop1 = trim($stdop1);
    
    $output2 = trim($output2);
    $stdop2 = trim($stdop2);
    
    $output3 = trim($output3);
    $stdop3 = trim($stdop3);
    

    // Default value for test cases
    $tc1 = "Failed";
    $tc2 = "Failed";
    $tc3 = "Failed";

    // Compairing the outputs
    if ($output1 == $stdop1)
    {
        $_SESSION['TC1'] = true;
        $tc1 = "Passed";
    };

    if ($output2 == $stdop2)
    {
        $_SESSION['TC2'] = true;
        $tc2 = "Passed";
    }

    if($output3 == $stdop3)
    {
        $_SESSION['TC3'] = true;
        $tc3 = "Passed";
    }

    // Score counting
    if($_SESSION['TC1'])
    { 
        $_SESSION['score'] += 10;
    }

    if($_SESSION['TC2'])
    {
        $_SESSION['score'] += 10;
    }

    if($_SESSION['TC3'])
    {
        $_SESSION['score'] += 10;
    }

    $score = $_SESSION['score'];
// --------------------------------------------------------------------------------------------------------------------------------------------

if(isset($_POST['stdin']))
    echo $output;
else
{
   
    $result = "Test case 1: $tc1
Test case 2: $tc2
Test case 3: $tc3
    
Your score: $score";

    echo $result;
}


?>