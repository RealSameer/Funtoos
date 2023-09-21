<?php
include 'config.php'
?>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

       if(!empty($username) && !empty($password)) {
         $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}';");
        if(mysqli_num_rows($sql) > 0) {
         $row = mysqli_fetch_assoc($sql);
       $_SESSION['unique_id'] = $row['id'];
       ?>
       <?php
      header("Refresh:0");
       header("Location:..\Games\game.html");
        echo "<meta http-equiv='refresh' content='0'>";
      } else {
        // echo '<div class="alert" role="alert"><center class="error">Incorrect username or password. Please try again.</center</div>';
    $error = '<div class="alert" role="alert"><center class="error">Incorrect username or password. Please try again.</center</div>';
      }
       } 
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontPage</title>
    <link rel="stylesheet" href="..\Nav bar\nav.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="index.js"></script>

</head>
<body >
  <center><div class="borderbox"></div></center>
  <nav class="navbar">
    <div class="content">
      <div class="logo"><a href="..\Index\index.php"><img src="..\Index\BW pic.png"></a></div>
      <ul class="menu-list">
        <li><a href="#" onclick="return confirm('Login In to play games!')" >Games</a></li>
        <li><a href="..\Index\index.php">Home</a></li>
        <li><a href="..\Registration\regis.php">Join us</a></li>
        <li><a href="..\About Us\AboutUS.html">About</a></li>
      </ul>
    </div>
  </nav>
  <div>
 <center> <h1 class="title"> WEB BASED GAMES</h1> </center>
</div>

<!-- Begining of the Index -->

<center><div class="boxxy">
  <h1 class="signup"> A Portfolio of Web games.</h1>
</div>
</center>

<center><div class="form">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
    <input type="text" name="username" placeholder="USERNAME">
    
    <input type="password" name="password" placeholder="PASSWORD">
    <button name="submit">Login </button>
    <p class="message">Haven't joined us ? <a href="..\Registration\regis.php"> Join us! </a></p> 
  </form>
  <div class ="err"> <i style= font-weight:50px><?php
if(isset($error) && isset($_POST['submit'])){

echo $error;

}

?></i></div>
</div></center>



 </body>

 
</html>
