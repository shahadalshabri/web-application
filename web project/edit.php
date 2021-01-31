<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"));
require_once "config.php";
$cId = $data->course_id;
$name = $data->name;
$field = $data->field;
$description = $data->description;

//$bin = base64_decode($Book_cover);
// Load GD resource from binary data
//$im = imageCreateFromString($bin);
//if (!$im) {
//  die('Base64 value is not a valid image');
//}

if(empty($cId)||empty($name)||empty($field)||empty($description)){
  echo("<p style='color:red'>you have to fill all the filed</p>");
}
else {
 $query = "UPDATE Course SET name = '$name', field = '$field', description = '$description' WHERE id = '$cId';";
 $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
if ($result) {
     echo "This course edited successfully";
     exit;
   } else {
     echo "<p style='color:red'>Error in editing course. refrish the page and try again</p>";
     exit;
   }
?>
