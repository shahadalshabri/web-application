<?php
session_start(); // Initialize the session
$ins_id = $_GET['id'];

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: InsLog.php");
    exit;
}
if (($_SESSION["type"]) == "student") {
  header("location: logout.php");
    exit;
}







// Include config file
require_once "config.php";


?>
<!DOCTYPE html>
<html>
<head>
<title>Instructor Home </title>

	<meta name="viewport" content="width=device-width", initial-scale="1">

	<link rel="stylesheet" href="exter/StyleSheet.css">
	<link rel="stylesheet" href="exter/back.css">

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
<h2>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
<?php
$mysqli = new mysqli('localhost', 'g42ksuit_tao', 'shahad123', 'g42ksuit_tao'); // add the database name (fourth parameter)
if(empty($_SESSION['username'])) {
    echo 'not logged in';
    exit;
}
$query = "SELECT email,name,speciality FROM Instructor WHERE username ='{$_SESSION['username']}'";
$result = $mysqli->query($query) or die($mysqli->error);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
echo "<h2> name :</h2>";
  echo $row['name'];
  echo "<h2> email :</h2>";
  echo $row['email'];
  echo "<h2> speciality :</h2>";
  echo $row['speciality'];
    }
}
else {
    echo 'not found';
}

?>
<div class="table-wrapper">

    <table class="fl-table">
        	<caption><h2> Available courses </h2></caption>
 

      <tr class="add" ><td>Course</td>
        <td>Student List</td>
        <td>Edit</td>
      </tr>
      <tr>
        <?php


        if(empty($_SESSION['username'])) {
            echo 'not logged in';
            exit;
        }
            $query = "SELECT id,name FROM Course WHERE instructor_id = '{$_SESSION['id']}'";
            $result = $mysqli->query($query) or die($mysqli->error);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>  <td>  <?php  echo '<a  href="courseinfo.php?id='.$row['id'].'#target">'.$row['name'].'</a>';
?>
               </td>
                <td><?php  echo '<a onclick="btnfun('.$row['id'].')" style="cursor:pointer;">'."Students list".'</a>';
                ?>
                <div id="clists<?php echo $row['id'];?>">
        
    </div>
              </td>

              <?php
                ?>  <td>
              <?php
              echo '<a href="courseinfo.php?edit=edit&id='.$row['id'].'">'."edit".'</a>';
              ?>
              </td>
  </tr>
                <?Php
              }
            }

            else {
                echo 'not found';
            }
            ?>





    </table>
    </div>
 
       <label> <input type="button" id ="Add_cour" value="+Add new course" onClick="location.href='AddCourse.php' "></label> 
        <label> <input type="button" id ="view" value="View contact Us messages " onClick="location.href='viewConact.php' "></label>

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
<script   src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
</body>
</html>

<script>
function btnfun(id){
    console.log('najla' ,id);
    $('#clists'+id).html("");
    if($('#clists'+id).is(":visible")){
        $('#clists'+id).hide();
    }else{
        $('#clists'+id).show();
            console.log('najla2' ,id);
    $.ajax({
type:"GET",
			url : "getStudents.php?course="+id,
			dataType:"text" ,
success: function(response){
  var name;
  var ID;
  var allstud="";
  console.log("",response);
  allstud+='<table class="fl-table" ><tr><th>Name</th><th>ID</th></tr><tbody>';
  
  $(response).find('Student').each(function(){
    name =$(this).find('Name').text();
    ID =$(this).find('Id').text();
    allstud+='<tr><td>'+name+'</td><td>'+ID+'</td></tr>';
  });
  allstud+='</tbody></table>';
  $('#clists'+id).append(allstud);
}

}); 
}}</script>