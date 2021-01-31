//onclick
function ValidateEmailIns()
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var e = document.getElementById("ins_eadd");

if(e.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");

return false;
}
}


function CheckPasswordIns() 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
var p = document.getElementById("ins_pass").value;

if(p.match(passw)) 
{ 
alert('Correct')
return true;
}
else
{ 
alert('Wrong! *[6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter]')
return false;
}
} 
///////////////
//student 
function ValidateEmailStu()
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var em = document.getElementById("stu_eadd");

if(em.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");

return false;
}
}



function CheckPasswordStu() 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
var pa = document.getElementById("stu_pass").value;

if(pa.match(passw)) 
{ 
alert('Correct')
return true;
}
else
{ 
alert('Wrong! *[6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter]')
return false;
}
} 


////
//signup

function sign(){
	var  f = document.getElementById("sign-f");
	
	var  l = document.getElementById("sign-L")
	
	if (f.value == '' || l.value =='' ){
	alert('You have to enter your first and last name');
	return false  ;	
	}else {
		return true ;
	}
}

function ValidateEmailSig()
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var ema = document.getElementById("sign-eadd");

if(ema.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");

return false;
}
}

function CheckPasswordSig() 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
var pw = document.getElementById("sign-pass").value;

if(pw.match(passw)) 
{ 
alert('Correct')
return true;
}
else
{ 
alert('Wrong! *[6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter]')
return false;
}
} 
///////// add course
function addcou(){
	var  c = document.getElementById("add_cousN");
	var  f = document.getElementById("add_fieN")
	var  d = document.getElementById("add_disc")
	
	if (c.value == '' || f.value ==''|| d.value =='' ){
	alert('You have to fill in all the blanks');
	return false  ;	
	}else {
		return true ;
	}
}

/////////
function dropcourse() {
  confirm("Are you sure that you want to drop this course!");
}

function inrollcourse() {
  confirm("Are you sure that you want to inroll to this course!");
}