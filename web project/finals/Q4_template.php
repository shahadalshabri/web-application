<?php
function array_to_xml($a){
//Write your code here:
$xml= "";
$xml='<?xml version="1.0" encoding="utf-8" ?>
<arreyValues>';
if(($a != null)){
foreach ($a as $key => $value) {
$xml.='
<'.$key.'>'.$value.'</'.$key.'>';}
  $xml.='</arreyValues>';
}
 echo $xml;


//Any code beyond this point WILL NOT be graded.
}
?>
