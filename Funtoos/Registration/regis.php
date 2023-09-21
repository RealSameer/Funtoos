<?php

$usernameErr = $emailErr = $passErr = $confirmpassErr = "";
$username = $email = $pass = $confirmpass = "";
$usernameErr="Enter your username";
$emailErr="Enter your Email";
$passErr = "Choose a password";
$confirmpassErr="Enter confirm password";


if( $_SERVER["REQUEST_METHOD"] == "POST"){

	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['email'];
	if (empty($_POST["username"])){
		$usernameErr = " Please enter a username.";
	} else {
		$username = $_POST["username"];
	}

	if (empty($_POST["email"])){
		// $emailErr = " Please enter an email.";
	} else {
		$email = $_POST["email"];
	}
//
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    // exit (" Invalid email ");
    $emailErr = "Invalid Email";
  }

  //

	if (empty($_POST["pass"])){
		$passErr = " Please enter a password.";
	} else {
		$pass = $_POST["pass"];
	}
	if (empty($_POST["password"])){
		$confirmpassErr = " Please enter a password.";
	} else {
	 $confirmpass = $_POST["pass"];
}
$servername="localhost";
$user="root";
$password="";
$database="register";

// Create connection
$conn = new mysqli($servername, $user, $password, $database);
 
$sql = "INSERT INTO users(username, email, password) VALUES ('$username','$email','$pass');";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}
}


 
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="..\Nav bar\nav.css">
    <link rel="stylesheet" type="text/css" href="regis.css">
    <script src="script.js"></script>

</head>
<body >
  <center><div class="borderbox"></div></center>
  <nav class="navbar">
    <div class="content">
      <div class="logo"><a href="..\Index\index.php"><img src="..\Index\BW pic.png"></a></div>
      <ul class="menu-list">
      <li><a href="#" onclick="return confirm('Login In to play games!')" >Games</a></li>
        <li><a href="..\Index\index.php">Home</a></li>
       <li><a href="..\Registration\regis.php" style=" background : dimgrey ; color: black;">Join us</a></li>
        <li><a href="..\About Us\AboutUS.html">About</a></li>
      </ul>
    </div>
  </nav>
  <div>
 <center> <h1 class="title"> WEB BASED GAMES</h1> </center>
</div>

<!-- Begining of the Index -->

<center><div class="boxxy">
  <h1 class="signup"> Sign in.</h1>

</div>
</center>

<center><div class="form">
  <p> Get In !</p>
  <form name="test" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
    <input type="text" name="username" placeholder="<?php echo $usernameErr;?>" onblur="validate();">
    <input type="text" name="email" placeholder="<?php echo $emailErr;?>">
    <input type="text" name="pass" placeholder="<?php echo $passErr;?>" id="test">
    <input type="password" name="confirmpass" placeholder="<?php echo $confirmpassErr;?>">
    <button name="submit" value="submit">Register</button>
    <p class="message">Welcome to the Gang!</p> 
  </form>
</div></center>
 </body>
</html>
