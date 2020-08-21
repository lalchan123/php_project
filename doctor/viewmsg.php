<?php 
include '../includes/User.php';
include '../includes/header.php'; 


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

	<?php include '../includes/navbar.php'; ?>
	 
	<div class="content-wrapper">
	<div class="container">
		<section class="content">
              
         <div class="col-sm-8 patient_message" style="background-color:#f2dede;">
            <h2>View Message</h2>
            <hr>
            
	        <form action="" method="post">
                
            <?php
                      $stmt = $user->db->pdo->prepare("SELECT * FROM patient_message WHERE id='$msgid' ");
					  $stmt->execute(['id'=>$msgid]);
					  foreach($stmt as $row){
					  
				  ?>
                    
         <input type="hidden" readonly class="form-control" id="PatientID" name="PatientID" value="<?php echo $row['PatientID']; ?>">
                  
                <div class="form-group">
                    <label for="Name" class="col-sm-2 control-label">Patient Name</label>

                    <div class="col-sm-5">
                      <input type="text"  readonly class="form-control" id="Name" name="Name" value="<?php echo $row['Name']; ?>">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label for="Email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text" readonly class="form-control" id="Email" name="Email" value="<?php echo $row['Email']; ?>">
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
                    <label for="message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-5">
                      <textarea name="message" readonly class="form-control tinymce" cols="6" rows="3"><?php echo $row['message']; ?></textarea>
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
  <?php include '../includes/profile_modal.php'; ?>	
</div>

<?php include '../includes/scripts.php'; ?>

</body>
</html>