<?php
session_start(); // Initialize the session
$ins_id = $_GET['id'];

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) ||($_SESSION["type"]) == "student"){
     header("location: logout.php");
    exit;
}

require_once "config.php";
header("Location:viewConact.php");

    $cpmmentID= $_GET['id'];
	$delet = "DELETE FROM Contact WHERE id=".$cpmmentID;
	mysqli_query($link, $delet);
		if ($mysqli->query($sql) === TRUE) 
       echo 'comment deleted';
    else echo "somthing went wrong try again";

?>
