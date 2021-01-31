<?php
session_start();

require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}?>
<!DOCTYPE html>
<html>
<head>
<title>contact us </title>

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

  <div class = "forme">





	<h2>Contact Us Messages</h2>

<?php


if (($_SESSION["type"]) == "instructor" ) { ?>
<a name="list">
<table class="fl-table">
<caption><h2 id="sl"> Messages list </h2></caption>
	    	<tr>
					<th>Messages ID</th>
					<th> name</th>
					<th> email</th>
					<th> comment</th>
					<th>delet</th>
				</tr>
	         <?php
	         $sql2 = "SELECT id ,name ,email,comment  FROM Contact ";
$result2 = $link->query($sql2);
if($result2->num_rows >0){
while($row2=mysqli_fetch_assoc($result2)){
echo '<tr><td>'.$row2['id'].'</td><td>'.$row2['name'].'</td><td>'.$row2['email'].'</td><td>'.$row2['comment'].'</td><td><a class="aa" href="deletComment.php?id='.$row2['id'].' ">delet</a></td></tr>';
}}
}
else {
	echo "only athorixed ppl";
}



 ?>






		</div>

</main>







<br>
<br>
<br>

</body>
</html>
