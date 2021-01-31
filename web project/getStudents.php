<?php
require_once "config.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header('Cache-Control: public;max-age=84600');
$id=isset($_GET['course'])?$_GET['course']:0;
$type=isset($_GET['type'])?$_GET['type']:'xml';
$header_type = "";
$xml_Json = "";
$all_courses= "SELECT Student.id AS sid,Student.name AS name  FROM Enrolment,Student WHERE Enrolment.course_id=".$id." AND Student.id=student_id";
$all_students = mysqli_query($link, $all_courses);
if ($type=="xml"){
header("Content-Type: application/xml; charset=UTF-8");
$xml_Json='<?xml version="1.0" encoding="utf-8" ?>
<Course>';

if(($all_students != null)){
foreach ($all_students as $key => $Student) {
$xml_Json.='<Student>
<Name>'.$Student['name'].'</Name>
<Id>'.$Student['sid'].'</Id>
</Student>';}

  $xml_Json.='</Course>';
}
//echo $xml_Json;
}
else if ($type=="json"){
header("Content-Type: application/json; charset=UTF-8");
$xml_Json.='{"Course": {
		"Student": [';
		if(($all_students != null)){
foreach ($all_students as $key => $Student) {
    $xml_Json.='{
				"Name": "'.$Student['name'].'",
				"Id": "'.$Student['sid'].'"
			},';
}
$xml_Json=substr($xml_Json,0,-1);
$xml_Json.=']}}';
}


/*	"Course": {
		"Student": [
			{
				"Name": "ddd",
				"Id": "22"
			},
			{
				"Name": "gjh",
				"Id": "1"
			},
			{
				"Name": "hjk",
				"Id": "3"
			}  //!!!!there is no ,!!!!
		]
	}
}*/

}//else Type
echo $xml_Json;
 ?>
