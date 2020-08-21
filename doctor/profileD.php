<?php 
include '../includes/User.php'; 
include '../includes/header.php';
?>

<?php
    if(isset($_GET['DoctorID'])){
		$userdID = (int)$_GET['DoctorID'];
	}

	$user = new User();
	if(isset($_POST['edit'])){
		$profileupdate = $user->UpdateUser($userdID, $_POST);
	}
?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
		<h2>Profile</h2>
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12 ">
				
	        		
				<div class="col-sm-4">
                                    <img  src="<?php 

                                     $images = session::get('images');
                                     if(isset($images)){
                                        echo 'images/'.$images;
                                     }
                                    ?>" class="img-circle" width="90%">
                                    	
								</div>
	        					<div class="col-sm-8" >
										<div class="row ">
											<div class="col-sm-3">
											       <h4>Doctor Name</h4>
													<h4>Email</h4>
													<h4>Contact Number</h4>
													<h4>Address</h4>
                                                    <h4>Category</h4>
                                                    <h4>Visit Fee</h4>
													<h4>Timing</h4>
											</div>
											<div class="col-sm-9">
													<h4>
														<?php 
															 $DoctorName = session::get("DoctorName");
															 if(isset($DoctorName)){
																 echo ":  ".$DoctorName;
															 }
														?>
													 </h4>
													    <span class="pull-right">
															<a href="#edit" class="btn btn-success btn-flat btn-sm editbtn" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
														</span>
													
													<h4>
                                                        <?php
                                                              $email = session::get("email");
                                                              if(isset($email)){
                                                                  echo ":  ".$email;
                                                              }
                                                        ?>
                                                    </h4>
                                                    <h4>
                                                        <?php
                                                             $ContactNumber = session::get("ContactNumber");
                                                             if(isset($ContactNumber)){
                                                                 echo ":  ".$ContactNumber;
                                                             }
                                                        ?>
                                                    </h4>
													<h4>
                                                        <?php 
                                                             $Address = session::get("Address");
                                                             if(isset($Address)){
                                                                 echo ":  ".$Address;
                                                             }
                                                        ?>
                                                    </h4>
													<h4>
                                                        <?php 
                                                           $categorey = session::get("categorey");
                                                           if(isset($categorey)){
                                                               echo ":  ".$categorey;
                                                           }
                                                        ?>
                                                    </h4>
													<h4>
                                                        <?php
                                                           $visit = session::get("visit");
                                                           if(isset($visit)){
                                                               echo ":  ".$visit;
                                                           }
                                                        ?>
                                                    </h4>
                                                    <h4>
                                                        <?php
                                                           $timing = session::get("timing");
                                                           if(isset($timing)){
                                                               echo ":  ".$timing;
                                                           }
                                                        ?>
                                                    </h4>
											</div>
										</div>
									   
                                </div>
				</div>	
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
	  <?php include '../includes/profile_modal.php'; ?>

</div>

<?php include '../includes/scripts.php'; ?>
</body>
</html>