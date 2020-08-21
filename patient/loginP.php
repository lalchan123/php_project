<?php 

include('../includes/User.php') 

?>

<?php
  $user = new User();
  if(isset($_POST['LoginP'])){
	  $userLogin = $user->patientLogin($_POST);
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	   <h2>Patient Login</h2>
    </div>

<form method="post" action="loginP.php">

	<?php 
	  //include ('../includes/errors.php')
	  if(isset($userLogin)){
		echo $userLogin;
	}
	
	?>

	<div class="input-group">
		<label>Patient ID</label>
		<input type="text" name="PatientID">

	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="Password" name="Password">
    </div>		

	<div class="input-group">
		<button type="submit" name="LoginP" class="btn">Login</button>
	</div>

	<p>
		Not a member? <a href="Pregister.php">Sign Up </a>
	</p>
	
</form>

</body>
</html>