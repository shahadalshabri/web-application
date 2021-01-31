<!DOCTYPE html>
<html>
<head>
<title>Tao Fitness</title>
	<meta name="viewport" content="width=device-width", initial-scale="1">
<style>
	div[class*=box] {
		height: 33.33%;
		width: 100%;
	  display: flex;
	  justify-content: center;
	  align-items: center;
	}

	.box-1 { background-color: #b2e4f7; }
	.btn {
		line-height: 50px;
		height: 50px;
		text-align: center;
		width: 250px;
		cursor: pointer;
	}

	/*
	========================
	      BUTTON ONE
	========================
	*/
	.btn-one {
		color: black;
		transition: all 0.3s;
		position: relative;
	}
	.btn-one span {
		transition: all 0.3s;
	}
	.btn-one::before {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 1;
		opacity: 0;
		transition: all 0.3s;
		border-top-width: 1px;
		border-bottom-width: 1px;
		border-top-style: solid;
		border-bottom-style: solid;
		border-top-color: rgba(255,255,255,0.5);
		border-bottom-color: rgba(255,255,255,0.5);
		transform: scale(0.1, 1);
	}
	.btn-one:hover span {
		letter-spacing: 2px;
	}
	.btn-one:hover::before {
		opacity: 1;
		transform: scale(1, 1);
	}
	.btn-one::after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 1;
		transition: all 0.3s;
		background-color: rgba(255,255,255,0.1);
	}
	.btn-one:hover::after {
		opacity: 0;
		transform: scale(0.1, 1);
	}

	#btn_home {
	  width: 100%;
	  height: 100%;
	  overflow: hidden;
	  margin: 0;
	  display: fixed;
	  flex-direction: column;
	  flex-wrap: wrap;
	  font-family: 'Open Sans Condensed', sans-serif;
	}


@import url("https://fonts.googleapis.com/css?family=Sacramento&display=swap");

.VisitS {
  font-size: calc(10px + 6vh);
  line-height: calc(20px + 20vh);
  text-shadow: 0 0 5px #85d8f7, 0 0 15px #85d8f7, 0 0 20px #85d8f7, 0 0 40px #85d8f7, 0 0 60px #b4b4b4, 0 0 10px #b4b4b4, 0 0 98px #b4b4b4;
    color: #85d8f7;
  font-family: "Times New Roman", Times, serif;
  text-align: center;
  animation: blink 12s infinite;
  -webkit-animation: blink 12s infinite;
}
@-webkit-keyframes blink {
  20%,
  24%,
  55% {
    color: #85d8f7;
    text-shadow: none;
  }

  0%,
  19%,
  21%,
  23%,
  25%,
  54%,
  56%,
  100% {
  text-shadow: 0 0 5px #85d8f7, 0 0 15px #85d8f7, 0 0 20px #85d8f7, 0 0 40px #85d8f7, 0 0 60px #b4b4b4, 0 0 10px #b4b4b4, 0 0 98px #b4b4b4;
    color: #85d8f7;
  }
}

@keyframes blink {
  20%,
  24%,
  10% {
    color: #111;
    text-shadow: none;
  }

  0%,
  19%,
  21%,
  23%,
  25%,
  54%,
  56%,
  100% {
/*     color: #fccaff;
    text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
      0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092; */
  text-shadow: 0 0 5px #b4b4b4 , 0 0 15px #b4b4b4 , 0 0 20px #b4b4b4 , 0 0 40px #b4b4b4 , 0 0 60px black , 0 0 10px #b4b4b4 , 0 0 98px #b4b4b4 ;
    color: #85d8f7;
  }
}


	</style>
	<link rel="stylesheet" href="exter/StyleSheet.css">
	<link rel="stylesheet" href="exter/back.css">


</head>
<body>
<header>
<div class="navbarIndex">
<h1><a href="index.php"><img src="images/logo.png" alt="logo" width="200" height="180"></a>
</br>Tao Fitness</h1>



<nav>

<div class="flex-container">

<div> <a class="aa" href="InsLog.php">Instructor</a> </div>
<div> <a class="aa" href="StuLog.php">Student</a> </div>
<div> <a class="aa" href="SignUp.php">Sign-up</a> </div>
<div> <a class="aa" href="About.html">About Us </a> </div>
<div> <a class="aa" href="Contact.php">Contact Us</a> </div>

</div>

 </nav>
  </div>


</header>
<hr>

<main>


</br>

<br>
</br>
</br>
</br>
<br>



	<div id ="btn_home">
	 <a  class ="ab" href="InsLog.php"> <div class="box-1">
	  <div class="btn btn-one">
	   <span >Log-in As  Instructor</span>
	  </div>
	</div> </a>

	<a  class ="ab" href="StuLog.php"> <div class="box-1">
	  <div class="btn btn-one">
	    <span>Log-in As Student</span>
	  </div>
	</div> </a>

	 <a  class ="ab" href="SignUp.php"> <div class="box-1">
	  <div class="btn btn-one">
	    <span> new Student Sign up! </span>
	  </div>
	</div> </a>


<br>

<?php
$conn = new mysqli("localhost", "g42ksuit_tao", "shahad123", "g42ksuit_tao");
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE Counter SET visits = visits+1 WHERE id = 1";
    $conn->query($sql);

    $sql = "SELECT visits FROM Counter WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $conn->close();

?>
        <h5 class ="VisitS">VisitS :<?php print $visits; ?> </h5> 

</main>
<footer>
<a class="aa" href="About.html">About Us </a>
<br>
<a class="aa" href="Contact.php">Contact Us</a>
<br>
<br>
©2020 Tao Fitness </footer>
</body>
</html>
