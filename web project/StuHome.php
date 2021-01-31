<?php
session_start(); // Initialize the session
// $queryi = "SELECT id FROM Enrolment WHERE studentID={$_SESSION['id']}";

// Check if the user is logged in, if not then redirect him to login page
$stud_id = $_GET['id'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || isset($_GET['myLink1'])){
    header("location: StuLog.php");
    exit;
}


if (($_SESSION["type"]) == "instructor") {
  header("location: logout.php");
    exit;
}
else {


}
require_once "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Student log-in </title>

	<meta name="viewport" content="width=device-width", initial-scale="1">

	<link rel="stylesheet" href="exter/StyleSheet.css">
	<link rel="stylesheet" href="exter/back.css">
	<script src="exter/sec.js"></script>
<script src="bmi.js"></script>

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
$query = "SELECT email,name FROM Student WHERE username ='{$_SESSION['username']}'";
$result = $mysqli->query($query) or die($mysqli->error);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
echo "<h2> name :</h2>";
  echo $row['name'];
  echo "<h2> email :</h2>";
  echo $row['email'];
    }
}
else {
    echo 'not found';
}

?>

<div class="table-wrapper">

    <table class="fl-table">
    	<caption><h2> Available courses </h2></caption>

        <thead>
        <tr>
            <th>Course</th>
            <th>Status </th>
            <th> Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        
      $sql1 =  "SELECT * FROM Course WHERE id IN (SELECT course_id FROM Enrolment WHERE student_id='{$_SESSION['id']}' ) ";
$result1=mysqli_query($link, $sql1);
if (mysqli_num_rows($result1) > 0) {

while($row1=mysqli_fetch_assoc($result1)){

            echo '<tr><td><a class="enrolled" href="courseinfo.php?id='.$row1['id'].' "> '. $row1['name'].' </a></td>';
            echo'<td class="enrolled" >Enrolled</td>';
           echo' <td><a class="enrolled" href="drop.php?id='.$row1['id'].' ">Drop</a></td></tr>';
        }}
           
           $sql2 = "SELECT * FROM Course WHERE id NOT IN (SELECT course_id FROM Enrolment WHERE student_id = '{$_SESSION['id']}' ) ;"; 
             $result2=mysqli_query($link, $sql2);
              if(mysqli_num_rows($result2) > 0) {
                  
             while($row2 = $result2->fetch_assoc()) {

            echo '<tr><td><a class="aa" href="courseinfo.php?id='.$row2['id'].' "> '. $row2['name'].' </a></td>';
            echo '<td><a class="aa" href="enroll.php?id='.$row2['id'].' " >Enroll</a></td><td></td></tr>';
           }}


?>
</tr>
        </tbody>
    </table>
</div>
      <form action="" method="post" id="form1">
<fieldset>
<legend>BMI Calculator</legend>
<div class="container">
<div id="firstd">
Height: <input type="text" name="height" size="4"></div>
<div id="secondd">
Weight: <input type="text" name="weight" size="4"> </div>
<div id="BMI_SC">
<p>BMI:
</p>
</div>
</div>
<input type="button" value="submit" onClick="return BMI_Score();">
<input type="Reset" value="reset">
</fieldset>
</form>
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
