<?php
session_start(); // Initialize the session


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: InsLog.php");
    exit;
}
if (($_SESSION["type"]) == "instructor") {

}
else {

  echo '<script type="text/javascript"> ';

  echo '  if (confirm("you are not instructor you will be logged out)")) {';
  header("location: logout.php");
  echo '  }';
  echo '</script>';

}
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
    $sql = "INSERT INTO Course (instructor_id,name,field,description) VALUES (?, ?, ?,?)";

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

<!DOCTYPE html>
<html>
<head>
<title>Add Course </title>

	<meta name="viewport" content="width=device-width", initial-scale="1">

	<link rel="stylesheet" href="exter/StyleSheet.css">
	<link rel="stylesheet" href="exter/back.css">

	<script src="exter/sec.js"></script>

</head>
<body>
<header>
<div id="navbar">
<h1><a href="index.php"><img src="images/logo.png" alt="logo" width="200" height="180"></a>
</br>Tao Fitness</h1>
<a class="out" href = "logout.php"><img src="images/out.PNG" alt="sign out" width="50" height="50"></a>


<nav>

<div class="flex-container">

<div> <a class="aa" href="InsLog.php">Instructor</a> </div>
<div> <a class="aa" href="StuLog.php">Student</a> </div>
<div> <a class="aa" href="SignUp.php">Sign-up</a> </div>
<div> <a class="aa" href="About.html">About Us </a> </div>
<div> <a class="aa" href="Contact.php">Contact Us</a> </div>

</div>

 </nav>
  </div>

<hr>
</header>

<main>


<br>
</br>
</br>
</br>
</br>




<div class = "forme">
		<form action="add.php" method="POST" id="Add_coueces" name="stu_log" enctype="multipart/form-data">

		<fieldset>

		  		<legend id="log">Add New Course </legend>
		        </br>
				        </br>

	   	<label><p> Course Name:</p> <input type="text" id ="add_cousN" name="Course_Name" placeholder ="enter the Course Name ... " ></label><br>
	     <label><p> Field:</p>   <input type="text"  id = "add_fieN" name="stu_pass" placeholder =""  ></label><br>
			<label><p> Descrption: </p> <textarea id ="add_disc"name="descrip" placeholder ="write the  Descrption ... " rows="6" cols="50"></textarea> </label>
	     <br>
	     <br>
	     <br>
		     <label> <input type="submit" id ="Add_cource" value=" Add !" formaction="InsHome.php" onclick=" addcou();" ></label> <!-- student home page-->
		  </form>
		  	</fieldset>

		</div>







<br>
<br>
<br>
</br>
</br>
</br>

</main>
<footer>
<a class="aa" href="About.html">About Us </a>
<br>
<a class="aa" href="Contact.php">Contact Us</a>
<br>
<br>
©2020 Tao Fitness </footer>
</body>
</html>
