<?php
require_once "config.php";
$id=isset($_GET['course'])?$_GET['course']:0;

$all_courses= "SELECT Student.id AS sid,Student.name AS name  FROM Enrolment,Student WHERE Enrolment.course_id=".$id." AND Student.id=student_id";

$all_students = mysqli_query($link, $all_courses);
$xml='<?xml version="1.0" encoding="utf-8" ?>
<Course>';

if(($all_students != null)){
foreach ($all_students as $key => $Student) {
$xml.='<Student>
<Name>'.$Student['name'].'</Name>
<Id>'.$Student['sid'].'</Id>
</Student>';}

  $xml.='</Course>';
}
echo $xml;



 ?>
