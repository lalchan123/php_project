<?php 

//include('../includes/server.php'); 
include('../includes/User.php'); 

?>

<?php
  $user = new User();
  if(isset($_POST['DRegister'])){
	  $userReg = $user->doctorReg($_POST);
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="Dregister.css">
</head>
<body>
	<div class="header">
	    <h2>Doctor Register</h2>
    </div>

<form method="POST" action="Dregister.php" enctype="multipart/form-data">
  
	<?php

	   if(isset($userReg)){
		   echo $userReg;
	   }
	?>

	<div class="input-groupA">
		<label>Doctor ID</label>
		<input type="text" name="DoctorID" >

	</div>


	<div class="input-groupA">
		<label>Doctor Name</label>
		<input type="text" name="DoctorName" >


	</div>

	<div class="input-groupA">
		<label>Address</label>
		<input type="text" name="Address">

	</div>

	<div class="input-groupA">
		<label>Contact Number</label>
		<input type="text" name="ContactNumber">


	</div>


	<div class="input-groupA">
		<label>Email address</label>
		<input type="text" name="email">

	</div>

	<div class="input-groupA">
		<label>Password</label>
		<input type="password" name="password">

	</div>
     <div class="input-groupA">
	      <label>Category</label>
			<select name="categorey" class="xd">
				<option value="bone" >bones</option>
				<option value="heart">heart</option>
				<option value="MentalHealth">Mental Health</option>
				<option value="Surgery">Surgery</option>
				<option value="Gynologist">Gynologist</option>
				<option value="Homopathi">Homopathi</option>
			</select>
		   </div>

	<div class="input-groupA">
		<label>Timing</label>
		<input type="text" name="timing">
	</div>

	<div class="input-groupA">
		<label>Visit Free</label>
		<input type="text" name="visit">
	</div>	 

	<div class="input-groupA">
		<label>Image Upload</label>
		<input type="file" name="images">

	</div>	   

	<div class="input-group">
		<button type="submit" name="DRegister" class="btn">Register</button>
	</div>

	<p>
		Already a member? <a href="loginD.php">Sign in </a>
	</p>



</form>

</body>
</html>