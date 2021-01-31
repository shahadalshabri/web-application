<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$comment = $data->comment;

/////////////////////////////////////////////////////////////

$link = mysqli_connect("localhost", "g42ksuit_tao", "shahad123", "g42ksuit_tao");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "INSERT INTO Contact (name, email, comment) VALUES (?, ?, ?)";
if(empty($name)||empty($email)||empty($comment)){
  echo("<p style='color:red'>you have to fill all the filed</p>");
}else{
if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $comment);

    if(mysqli_stmt_execute($stmt)){
        echo "send successfully !! :) ";
    } else{
        echo "<p style='color:red'>opps !! something went wrong try again :( : $sql. </p>" . mysqli_error($link);
    }
} else{
    echo "<p style='color:red'>opps !! something went wrong try again :( : $sql. </p>" . mysqli_error($link);
}
}
// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);





///////////////////////////////////////////////////////////////







?>
