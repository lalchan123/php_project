<?php 
include('../includes/User.php'); 

?>

<?php
	$user = new User();
	if(isset($_POST['RegisterP'])){
		$patientReg = $user->PatientRegistration($_POST);
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
	<h2>Patient Register</h2>
</div>

<form method="post" action="Pregister.php" enctype="multipart/form-data">

	<?php 
		//include ('../includes/errors.php');
		if(isset($patientReg)){
			echo $patientReg;
		}
	
	?>

	<div class="input-group">
		<label>Patient ID</label>
		<input type="text" name="PatientID" >

	</div>


	<div class="input-group">
		<label>Patient Name</label>
		<input type="text" name="Name" >


	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="Address">

	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNumber">


	</div>


	<div class="input-group">
		<label>Email address</label>
		<input type="text" name="Email">

	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="password" name="Password">

	</div>

	<div class="input-group">
		<label>Blood type</label>
		<input type="text" name="Bloodtype">

	</div>

	<div class="input-group">
		<label>Image Upload</label>
		<input type="file" name="Images" >

	</div>
   

	<div class="input-group">
		<button type="submit" name="RegisterP" class="btn">Register</button>
	</div>

	<p>
		Already a member? <a href="loginP.php">Sign in </a>
	</p>
	




</form>

</body>
</html>