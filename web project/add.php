/*<?php
session_start(); 

require_once "config.php";
$name=$_GET['Course_Name'];
$field=$_GET['stu_pass'];
$descrption=$_GET['descrip'];
$sql="INSERT INTO Course(name , field, description) VALUES ('$name' , '$field' , '$descrption');";
	mysqli_query($link, $sql);

 ?> */
 
 
 <?php
// Include config file
require_once "config.php";
$ins_id = $_GET['id'];

$name =    $field =    $descrption="";
$name_err = $field_err =$descrption_err ="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST["Course_Name"]))){
        $name = "Please enter a course name.";
    } else{

        $sql = "SELECT id FROM Course WHERE title = ?";

        if($stmt = mysqli_prepare($link, $sql)){
  
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set parameters
            $param_name = trim($_POST["Course_Name"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                $name = trim($_POST["Course_Name"]);
                      mysqli_stmt_close($stmt);
        }
    }
       if(empty(trim($_POST["stu_pass"]))){
        $field_err = "Please enter course field.";
    } else{
        $field = trim($_POST["stu_pass"]);
    }
    
    if(empty(trim($_POST["descrip"]))){
       $descrption_err = "Please enter course description.";
    } else{
        $descrption = trim($_POST["descrip"]);
    }
    $sql = "INSERT INTO Course (instructor_id,name,field,description) VALUES (?, ?, ?)";
    
    if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_ins ,$param_name, $param_field, $param_descrip );
            
            $param_ins = $ins_id;
            $param_name = $name;
            $param_field = $field;
            $param_descrip = $descrption;
            
              if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("Location:CourseInfo.php?id=" . $_SESSION["id"]);
                echo "Course added successfully.";
            } else{
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);}
          ?>
            