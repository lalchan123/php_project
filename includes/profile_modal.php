
<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Account</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
             <?php
                if(isset($profileupdate)){
                  echo $profileupdate;
                }
               
             ?>

             <!-- <input type="hidden" class="form-control" id="DoctorID" name="DoctorID" value="<?php //$DoctorID = session::get("DoctorID");
										//					 if(isset($DoctorID)){
														//		 echo $DoctorID;
															// }
                           ?>
                      ">-->
              
                <div class="form-group">
                    <label for="DoctorName" class="col-sm-3 control-label">Doctor Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="<?php $DoctorName = session::get("DoctorName");
															 if(isset($DoctorName)){
																 echo $DoctorName;
															 }
                           ?>
                      ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php $email =session::get("email");
                          if(isset($email)){
                            echo $email;
                          }
                      ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ContactNumber" class="col-sm-3 control-label">ContactNumber</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" value="<?php $ContactNumber = session::get("ContactNumber");
                             if(isset($ContactNumber)){
                               echo $ContactNumber;
                             }
                        ?>
                      ">
                    </div>
                </div>
              <!--  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php ///$password = session::get("password");
                        // if(isset($password)){
                        //   echo $password;
                        // }
                      
                      ?>">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="Address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Address" name="Address" value="<?php  $Address = session::get("Address");
                          if(isset($Address)){
                            echo $Address;
                          }
                      ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="categorey" class="col-sm-3 control-label">category</label>

                    <div class="col-sm-9">
                        <select class="form-control" id="categorey" name="categorey" class="xd">
                            <option> 
                            <?php
                                   $categorey = session::get("categorey");
                                   if(isset($categorey)){
                                     echo $categorey;
                                   }
                              ?> 
                            </option>
				                    <option value="bone" >bones</option>
			                     	<option value="heart">heart</option>
			                    	<option value="Dentistry">Dentistry</option>
			                    	<option value="MentalHealth">Mental Health</option>
			                    	<option value="Surgery">Surgery</option>
				                    <option value="Gynologist">Gynologist</option>
			                  </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="visit" class="col-sm-3 control-label">Visit Fee</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="visit" name="visit" value="<?php $visit = session::get("visit");
                          if(isset($visit)){
                            echo $visit;
                          }
                      ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="timing" class="col-sm-3 control-label">timing</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="timing" name="timing" value="<?php $visit = session::get("timing");
                          if(isset($timing)){
                            echo $timing;
                          }
                      ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="images" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="images" name="images">
                    </div>
                </div>
                <hr>
               <!-- <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="please give the current password for update your own profile" required>
                    </div>
                </div>-->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>