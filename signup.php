<!DOCTYPE html>
<html>
  <head><link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>

  <div class="form">
<h1>Registration</h1>
<hr>
<form name="registration" action="" method="post">
<label for="Name"><b>Name</b></label>
<input type="text" name="username" placeholder="Username" required />
<label for="email"><b>Email</b></label>
<input type="email" name="email" placeholder="Email" required />
<label for="password"><b>Pasword</b></label>
<input type="password" name="password" placeholder="Password" required />
<label for="Plan"><b>Plan</b></label>
    <select name="reg_plan" id="plan">
      <option value="Basic">Basic</option>
      <option value="Standard">Standard</option>
      <option value="Premium">Premium</option>
    </select>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $reg_plan = stripslashes($_REQUEST['reg_plan']);
        $reg_plan = mysqli_real_escape_string($con,$reg_plan);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date, reg_plan)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$reg_plan')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<?php } ?>
    </body>
    </html>
