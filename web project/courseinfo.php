<?php
session_start();

require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$course_id = $_GET['id'];

$connect = mysqli_connect("localhost", "g42ksuit_tao", "shahad123", "g42ksuit_tao");

// Define variables and initialize with empty values
$name =    $field =    $name =    $instructor_id =     $description = "";
$name_err = $field_err =$name_err = $instructor_id_err = $description_err ="";
$query = "SELECT Instructor.name, Course.name, Course.field, Course.description, Course.book_cover FROM Instructor, Course WHERE Course.id=".$course_id." and instructor_id = Instructor.id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>course info </title>

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


<a class="out" href="index.php"><img src="images/out.PNG" alt="sign out" width="50" height="50"></a>

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




<?php if (isset($_REQUEST['edit']) && $_REQUEST['edit'] == 'edit') { ?>
<h2> You are viewing in Edit mode. </h2>
 </br></br>
<fieldset>

<input type="hidden"  id="course_id" name="id" value="<?php echo $course_id; ?>">
              Name : <input type="text" id="name" name="name" required value="<?php echo $row[1]; ?>"> <br/>
              field:  <input type="text" id="field" name="field" class="form-control" required value="<?php echo $row[2]; ?>"> <br>
           <br>
           <br>
        Description:  <textarea type="textarea" id="description" name="description" class="form-control" rows="4" cols="50" ><?php echo $row[3]; ?> </textarea>

    
       <script>

    /*   var handleFileSelect = function(evt) {
           var files = evt.target.files;
           var file = files[0];

           if (files && file) {
               var reader = new FileReader();

               reader.onload = function(readerEvt) {
                   var binaryString = readerEvt.target.result;
                   document.getElementById("base64textarea").value = btoa(binaryString);
                   alert("in");

               };

               reader.readAsBinaryString(file);
           }
       };

       if (window.File && window.FileReader && window.FileList && window.Blob) {
           document.getElementById('book_cover').addEventListener('change', handleFileSelect, false);
       } else {
           alert('The File APIs are not fully supported in this browser.');
          // <p id="test1"></p>
   }
*/

       </script>
                 <br/>
                 <label> <input type="button" id ="view" value="Save changes" onClick="editSendJSON()"></label>

                 <p class="result" style="color:green"></p>


                 <!-- Include the JavaScript file -->
                 <script src="index.js"></script>


            </fieldset>
<?php }





 else {
$sql1 = "SELECT * FROM Course WHERE id='$course_id'; " ;
$result1 = $link->query($sql1);
if($result1->num_rows >0)
while($row1=mysqli_fetch_assoc($result1)){
echo "<h2>Welcome to ". $row1['name']."</h2>";
echo '<br>';
echo '<h3>Field:</h3><p>'.$row1['field'].'</p>';
echo '<br>';
echo '<h3>Descrption:</h3><p>'.$row1['description'].'</p>';
echo '<br>';
 echo'<h3> Cover:</h3>';  ?>
 <?php $a=$row['book_cover']; ?><img width='250px' height='350px' src='data:image/jpeg;base64, <?php  echo base64_encode($a);?>' >
 <?php
 echo '<br>';



}
if (($_SESSION["type"]) == "instructor" ) { ?>
<a name="list">
<table class="fl-table">
<caption><h2 id="sl"> Students list </h2></caption>
	    	<tr> <th>Student ID</th>
	         <th>Student name</th></tr>
	         <?php
	         $sql2 = "SELECT Student.id AS sid,Student.name AS name  FROM Enrolment,Student WHERE Enrolment.course_id=".$course_id." AND Student.id=student_id";
$result2 = $link->query($sql2);
if($result2->num_rows >0){
while($row2=mysqli_fetch_assoc($result2)){
echo '<tr><td>'.$row2['sid'].'</td><td>'.$row2['name'].'</td></tr>';
}}
 echo '<label><a id ="Edit" href="courseinfo.php?edit=edit&id='.$course_id.' " >Edit</a></label>';
}
else if(($_SESSION["type"]) == "student"){
	echo '<label><a href="enroll.php?id='.$course_id.' " class="buttons" value="Enroll" >Enroll</a></label><br><br>' ;
	echo '<label><a href="drop.php?id='.$course_id.' " class="buttons" value="drop" >Drop</a></label>' ;
}}?>


</table>
	</div>
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
