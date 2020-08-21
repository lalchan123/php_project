
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
                    <label for="Name" class="col-sm-3 control-label">Patient Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Name" name="Name" value="<?php $Name = session::get("Name");
															 if(isset($Name)){
																 echo $Name;
															 }
                           ?>
                      ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Email" name="Email" value="<?php $Email =session::get("Email");
                          if(isset($Email)){
                            echo $Email;
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
                    <label for="Bloodtype" class="col-sm-3 control-label">Bloodtype</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Bloodtype" name="Bloodtype" value="<?php  $Bloodtype = session::get("Bloodtype");
                          if(isset($Bloodtype)){
                            echo $Bloodtype;
                          }
                      ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Images" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="Images" name="Images">
                    </div>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>