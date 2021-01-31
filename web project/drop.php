<?php
session_start(); 
require_once "config.php";
header("Location:StuHome.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || isset($_GET['myLink1'])){
    header("location: StuLog.php"); 
   } 
   else{
    $id=  $_SESSION["id"];
    $idc= $_GET['id'];
	$s = "DELETE FROM Enrolment WHERE course_id=".$idc." AND student_id=". $id;
	mysqli_query($link, $s);
		if ($mysqli->query($sql) === TRUE) {
       echo 'Course dropped';
    echo '<script> window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"</script>';
}}
?>