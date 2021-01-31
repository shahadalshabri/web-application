<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: InsLog.php");
    exit;
}
if (($_SESSION["type"]) == "student") {
  echo '<script type="text/javascript"> ';

  echo '  if (confirm("you are not instructor you will be logged out)")) {';
  header("location: logout.php");
  echo '  }';
  echo '</script>';
}


// Include config file
require_once "config.php";
  $mysqli = new mysqli('localhost', 'g42ksuit_tao', 'shahad123', 'g42ksuit_tao');
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {//first
  $id=$_SESSION["id"];
  $title=$_POST['title'];
  $field=$_POST['field'];
  $description=$_POST['description'];
   if(!empty($_FILES['Book_cover']['tmp_name'])){
        $Book_cover = addslashes(file_get_contents($_FILES['Book_cover']['tmp_name']));}
        else
         $Book_cover ="";
 // $Book_cover=$_POST['Book_cover'];


  $sql= "INSERT INTO Course (instructor_id,name, field, description, book_cover) VALUES ('$id','$title', '$field', '$description','$Book_cover')";
  $add=mysqli_query($link, $sql);
  if(!$add){
   // echo "data not inserted" . mysqli_error($link);

  }
  else {
   $sql = "SELECT id FROM Course WHERE name = '$title'";
     $res = $mysqli->query($sql) or die($mysqli->error);
        if($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
            //echo $row['id'];
           header("Location:courseinfo.php?id=".$row['id']);
          }
        }
             

    echo "data inserted";


$sql2 = "SELECT id FROM Course WHERE instructor_id='$id' AND name='$title'";
$resul1t=mysqli_query($link, $sql2);
while($rows=mysqli_fetch_assoc($resul1t)){
	$idco = $rows['id'];
	}
 }
  }


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
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="form" enctype="multipart/form-data">
		<fieldset>



		  		<legend id="log">Add New Course </legend>
		        </br>
				        </br>
							<label>Course title:</label>
   <input type="text" name="title" placeholder="Enter title" class="form-control" id="title" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter character only. ')" required><br>
<label>Course field:</label>
  <input type="text" name="field" id="field" placeholder="Enter field" class="form-control" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter character only. ')" required><br>
<label>Course description:</label> <br>
  <textarea name="description" placeholder="Enter description" class="form-control" rows="8" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter character only. ')" cols="80" required></textarea><br>
<label>Course image file:</label>
<input type="file" name="Book_cover" id="Book_cover"><br>

  <input type="submit" class="button">
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

