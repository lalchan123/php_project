<?php 
include '../includes/User.php'; 
include '../includeD/header.php';
?>

<?php
    if(isset($_GET['PatientID'])){
		$userdID = (int)$_GET['PatientID'];
	
	}

	$user = new User();
	if(isset($_POST['edit'])){
		$profileupdateP = $user->UpdatePatient($userdID, $_POST);
	}
?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includeD/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
		<h2>Profile</h2>
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12 ">
				
	        		
				<div class="col-sm-4">
                                    <img  src="<?php 

                                     $Images = session::get('Images');
                                     if(isset($Images)){
                                        echo 'images/'.$Images;
                                     }
                                    ?>" class="img-circle" width="90%">
                                    	
								</div>
	        					<div class="col-sm-8" >
										<div class="row ">
											<div class="col-sm-3">
                                                    <h4>Patient Name</h4>
													<h4>Email</h4>
													<h4>Contact Number</h4>
													<h4>Address</h4>
                                                    <h4>Bloodtype</h4>
											</div>
											<div class="col-sm-9">
													<h4>
														<?php 
															 $Name = session::get("Name");
															 if(isset($Name)){
																 echo ":  ".$Name;
															 }
														?>
													 </h4>
													    <span class="pull-right">
															<a href="#edit" class="btn btn-success btn-flat btn-sm editbtn" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
														</span>
													
													<h4>
                                                        <?php
                                                              $Email = session::get("Email");
                                                              if(isset($Email)){
                                                                  echo ":  ".$Email;
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
                                                           $Bloodtype = session::get("Bloodtype");
                                                           if(isset($Bloodtype)){
                                                               echo ":  ".$Bloodtype;
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
  
	  <?php include '../includeD/profile_modal.php'; ?>

</div>

<?php include '../includes/scripts.php'; ?>
</body>
</html>