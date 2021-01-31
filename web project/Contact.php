<?php
session_start(); // Initialize the session
if (($_SESSION["type"]) == "instructor") {
  header("location: viewConact.php");
    exit;
}
?>
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
	<h2>Contact Us</h2>
	Name : <input type="text" id="name" name="name" required> <br/>
	Email : <input type="email" id="email" name="email" required> <br/>
Comment:  <textarea type="textarea" id="comment" name="comment" rows="4" cols="50" required></textarea> <br/>
<br/>
<input type="submit" onclick="sendJSON()" name="" value="send">

<p class="result" style="color:green"></p>


<!-- Include the JavaScript file -->
<script src="cont.js"></script>


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
