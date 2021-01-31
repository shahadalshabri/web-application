<?php
session_start(); 
require_once "config.php";
header("Location:StuHome.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || isset($_GET['myLink1'])){
    header("location: StuLog.php"); 
   } else{
    
$id=  $_SESSION["id"];
$idc= $_GET['id'];
$sql = "INSERT INTO Enrolment(student_id,course_id) VALUES (". $id.", ".$idc.")";
mysqli_query($link, $sql);
if ($mysqli->query($sql) === TRUE) {
echo 'Course added';
echo '<script> window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"</script>';
 } else {
   echo "Error: " . $sql . "<br>" . $mysqli->error;}
   }
?>
