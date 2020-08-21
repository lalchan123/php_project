<?php 
//include('../includes/server.php') 
include('../includes/User.php'); 
?>


<?php
  $user = new User();
  if(isset($_POST['Login'])){
	  $userLogin = $user->doctorLogin($_POST);
  }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="loginD.css">
</head>
<body>
	<div class="header">
	   <h2>Doctor Login</h2>
    </div>

<form method="post" action="loginD.php">

	<?php 
	//include ('../includes/errors.php')
	if(isset($userLogin)){
		echo $userLogin;
	}
	?>

	<div class="input-group">
		<label>Doctor ID</label>
		<input type="text" name="DoctorID">

	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="Password" name="password">
    </div>		

	<div class="input-group">
		<button type="submit" name="Login" class="btn"> Login</button>
	</div>

	<p>
		Not a member? <a href="Dregister.php">Sign Up </a>
	</p>
	
</form>

</body>
</html>