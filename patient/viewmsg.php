<?php 
include '../includes/User.php';
include '../includeD/header.php'; 


?>

<?php
  $user = new User();
  if(isset($_GET['msgid'])){
         $msgid = (int)$_GET['msgid'];
  }
   
  if(isset($_POST['submit'])){
    header('location: inbox.php');
  }

?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includeD/navbar.php'; ?>
	 
	<div class="content-wrapper">
	<div class="container">
		<section class="content">
              
         <div class="col-sm-8 patient_message" style="background-color:#f2dede;">
            <h2>View Message</h2>
            <hr>
            
	        <form action="" method="post">
                
            <?php
                      $stmt = $user->db->pdo->prepare("SELECT * FROM doctor_reply WHERE id='$msgid' ");
					  $stmt->execute(['id'=>$msgid]);
					  foreach($stmt as $row){
					  
				  ?>
                    
         <input type="hidden" readonly class="form-control" id="DoctorID" name="DoctorID" value="<?php echo $row['DoctorID']; ?>">
                  
                <div class="form-group">
                    <label for="Name" class="col-sm-2 control-label">Doctor Name</label>

                    <div class="col-sm-5">
                      <input type="text"  readonly class="form-control" id="DoctorName" name="DoctorName" value="<?php echo $row['DoctorName']; ?>">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text" readonly class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="ContactNumber" class="col-sm-2 control-label">ContactNumber</label>

                    <div class="col-sm-5">
                      <input type="text" readonly class="form-control" id="ContactNumber" name="ContactNumber" value="<?php echo $row['ContactNumber']; ?>
                      ">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="reply_message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-5">
                      <textarea name="reply_message" readonly class="form-control tinymce" cols="6" rows="3"><?php echo $row['reply_message']; ?></textarea>
                    </div>
                </div>
                <br><br><br><br>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Date Added</label>
                    <div class="col-sm-5">
                      <input type="text" readonly class="form-control" id="date" name="date" value="<?php echo $user->fm->formatDate($row['date']); ?>
                      ">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="submit" class="col-sm-2 control-label"></label>
                    <div class="col-sm-2">
                      <input type="submit" class="form-control btn btn-success"  name="submit" value="OK">
                    </div>
                </div>
                <br><br>
            <?php } ?>
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