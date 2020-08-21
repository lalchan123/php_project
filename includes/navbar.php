<?php
   $filepath = realpath(dirname(__FILE__));
   include_once $filepath.'/../includes/session.php';
   session::init();

   $DoctorID = session::get('DoctorID');
?>

<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        </h2><a href="indexD.php?DoctorID=<?php echo $DoctorID ?>" class="navbar-brand"><strong>Doctor</strong></a></h2>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="doctor_profile.php" class="navbar-brand"><strong>Doctor Profile</strong></a></li>
        </ul>
      </div> 
      
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="inbox.php"  class="navbar-brand"><strong>Inbox
               <?php
                /* $stmt = $user->db->pdo->prepare("SELECT * FROM patient_message WHERE DoctorID='$DoctorID' AND status='0' order by id DESC");
                 $msg = $stmt->execute(['DoctorID'=>$DoctorID]);
                  if($msg){
                     $count = mysqli_num_rows($msg);
                     echo "(".$count.")";
                    
                  }else{
                    echo "(0)";
                  }*/
               ?>
          </strong></a></li>
        </ul>
      </div> 
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="feedback.php" class="navbar-brand"><strong>Feedback</strong></a></li>
        </ul>
      </div> 
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav ">
        
               
               
                      
                            <li class="dropdown user user-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php $images = session::get('images');
                                     if(isset($images)){
                                        echo 'images/'.$images;
                                     }?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php $DoctorName = session::get("DoctorName");
                                      if(isset($DoctorName)){
                                        echo $DoctorName;
                                      }
                                  ?>
                                </span>
                              </a>
                              <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                  <img src="<?php $images = session::get('images');
                                     if(isset($images)){
                                        echo 'images/'.$images;
                                     } ?>" class="img-circle" alt="User Image">
                                  
                                  <p><?php $DoctorName = session::get("DoctorName");
                                      if(isset($DoctorName)){
                                        echo $DoctorName;
                                      }?>
                                  </p>
                                  <p> <?php $categorey = session::get("categorey");
                                      if(isset($categorey)){
                                        echo $categorey;
                                      }?>
                                  </p>
                                </li>
                                <li class="user-footer">
                                  <div class="pull-left">
                                    <a href="profileD.php?DoctorID=<?php echo $DoctorID ?>" class="btn btn-default btn-flat">Profile</a>
                                  </div>
                                  <div class="pull-right">
                                    <a href="../Doctorpatient.php" class="btn btn-default btn-flat">Sign out</a>
                                  </div>
                                </li>
                              </ul>
                            </li>
                          
                       
        

        </ul>
      </div>
    </div>
  </nav>
</header>