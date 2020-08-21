<?php 
include '../includes/User.php';
include '../includeD/header.php'; 


?>

<?php

  if(isset($_GET['DoctorID'])){
         $DoctorID = (int)$_GET['DoctorID'];
  }

  $user = new User();
  if(isset($_POST['submit'])){
    $patientMessage = $user->PatientApply($DoctorID,$_POST);
} 

?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includeD/navbar.php'; ?>
	 
	<div class="content-wrapper">
	<div class="container">
		<section class="content">
              
         <div class="col-sm-8 patient_message" style="background-color:#f2dede;">
            <h2>Doctor Appointment</h2>
            <hr>
            <?php
                        if(isset($patientMessage)){
                            echo $patientMessage;
                            
                        }
                ?>
	        <form action="" method="post">
                

                    
         <input type="hidden" class="form-control" id="PatientID" name="PatientID" value="<?php $PatientID = session::get("PatientID"); if(isset($PatientID)){ echo $PatientID; }?>">
                  
                <div class="form-group">
                    <label for="Name" class="col-sm-2 control-label">Patient Name</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="Name" name="Name" value="<?php $Name = session::get("Name");
															 if(isset($Name)){
																 echo $Name;}?>">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label for="Email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="Email" name="Email" value="<?php $Email=session::get("Email");if(isset($Email)){
                            echo $Email;
                          }
                      ?>">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="ContactNumber" class="col-sm-2 control-label">ContactNumber</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" value="<?php $ContactNumber = session::get("ContactNumber");
                             if(isset($ContactNumber)){
                               echo $ContactNumber;
                             }
                        ?>
                      ">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-5">
                      <textarea name="message"  class="form-control tinymce" cols="6" rows="3"></textarea>
                    </div>
                </div>
                <br><br><br><br>
                <div class="form-group">
                    <label for="submit" class="col-sm-2 control-label"></label>
                    <div class="col-sm-2">
                      <input type="submit" class="form-control btn btn-success"  name="submit" value="Send">
                    </div>
                </div>
                <br><br>
            </form>
          </div>
		 </section>	 
     </div>
  </div> 
  <?php include '../includeD/profile_modal.php'; ?>	
</div>

<?php include '../includes/scripts.php'; ?>

</body>
</html>