function BMI_Score(){

var h=document.getElementById("height").value;
var w=document.getElementById("weight").value;
var total=10;
var bclass="";
if(h == "" || w == ""){
alert("please answer all the questions");
}
else if(isNaN(h) || isNaN(w)){
alert("please enter a valid number");
}
else{
total=w/(h*h);
if(total<18.5)
bclass="Underweight";
else if(total<25)
bclass="Normal Weight";
else if(total<30)
bclass="Overweight";
else if(total>=30)
bclass="Obesity";
document.getElementById("BMI_SC").innerHTML="BMI="+total+"\n"+bclass;

}
}