<?php 
include '../includes/User.php';
include '../includes/header.php'; 


?>

<?php

  if(isset($_GET['PatientID'])){
         $PatientID = (int)$_GET['PatientID'];
  }

  $user = new User();
  if(isset($_POST['submit'])){
    $doctorMessage = $user->DoctorReply($PatientID,$_POST);
} 

?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includes/navbar.php'; ?>
	 
	<div class="content-wrapper">
	<div class="container">
		<section class="content">
              
         <div class="col-sm-8 patient_message" style="background-color:#f2dede;">
            <h2>Doctor Reply Message</h2>
            <hr>
            <?php
                        if(isset($doctorMessage)){
                            echo $doctorMessage;
                            
                        }
                ?>
	        <form action="" method="post">
                

                    
         <input type="hidden" class="form-control" id="DoctorID" name="DoctorID" value="<?php $DoctorID = session::get("DoctorID"); if(isset($DoctorID)){ echo $DoctorID; }?>">
                  
                <div class="form-group">
                    <label for="DoctorName" class="col-sm-2 control-label">Doctor Name</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="<?php $DoctorName = session::get("DoctorName");
															 if(isset($DoctorName)){
																 echo $DoctorName;}?>">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="email" name="email" value="<?php $email=session::get("email");if(isset($email)){
                            echo $email;
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
                    <label for="reply_message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-5">
                      <textarea name="reply_message"  class="form-control tinymce" cols="6" rows="3"></textarea>
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
  <?php include '../includes/profile_modal.php'; ?>	
</div>

<?php include '../includes/scripts.php'; ?>

</body>
</html>