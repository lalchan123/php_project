<?php

include_once 'session.php';
include 'Database.php';
include '../Helpers/Format.php';



class User{
    public $db,$fm;
    public $error;
    public function __construct(){
       $this->db = new Database();
       $this->fm = new Format();
    }
   

    // Select or Read data
public function select($query){
    $result = $this->db->query($query) or 
     die($this->db->error.__LINE__);
    if($result->num_rows > 0){
      return $result;
    } else {
      return false;
    }
   }
   
  // Insert data
  public function insert($query){
   $insert_row = $this->db->query($query) or 
     die($this->db->error.__LINE__);
   if($insert_row){
     return $insert_row;
   } else {
     return false;
    }
   }
    
  // Update data
   public function update($query){
   $update_row = $this->db->query($query) or 
     die($this->db->error.__LINE__);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
   }
    
  // Delete data
   public function delete($query){
   $delete_row = $this->db->query($query) or 
     die($this->db->error.__LINE__);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
    }
   }
    public function doctorReg($data){

    $DoctorID 	      = $data['DoctorID'];
	$DoctorName 	  = $data['DoctorName'];
	$Address 	      = $data['Address'];
	$ContactNumber	  = $data['ContactNumber'];
	$email 		      = $data['email'];
	$password         = md5($data['password']);
    $categorey 	      = $data['categorey'];
    $timing 	      = $data['timing'];
    $visit 	          = $data['visit'];
    $images         = $_FILES['images']['name'];
    $filetmpname      = $_FILES['images']['tmp_name'];
   
    $folder           = 'images/';

    move_uploaded_file($filetmpname,$folder.$images); 


	

    if($DoctorID == '' OR $DoctorName == '' OR $email == '' OR $Address == '' OR $ContactNumber =='' OR $password == '' OR $categorey == '' OR  $timing == '' OR  $visit == '' OR $images == ''){
        $msg="<div class='btn btn-danger'>All Field are required</div>";
        return $msg;
    }
        

    
         $sql = $this->db->pdo->prepare("INSERT INTO  doctor (DoctorID, DoctorName, email, Address, ContactNumber, password,categorey,timing,visit,images) VALUES ('$DoctorID','$DoctorName','$email','$Address','$ContactNumber','$password','$categorey','$timing','$visit','$images')");
        
         $result = $sql->execute(['DoctorID'=>$DoctorID, 'DoctorName'=>$DoctorName, 'email'=>$email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'password'=>$password,'categorey'=>$categorey,'timing'=>$timing,'visit'=>$visit,'images'=>$images,]);

         if($result){
            $_SESSION['success']="you are now logged in";
            header('location: loginD.php');
         
       }	   
        
    }

    public function getLoginUser($DoctorID,$password){
        $sql=$this->db->pdo->prepare("SELECT * FROM doctor WHERE DoctorID='$DoctorID' AND password='$password' LIMIT 1");
        $sql->execute(['DoctorID'=>$DoctorID,'password'=>$password,]);
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function doctorLogin($data){

        $DoctorID 	= $data['DoctorID'];
        $password 	= md5($data['password']);
    
        if($DoctorID == '' OR  $password == ''){
            $msg="<div class='btn btn-danger'>Doctor and Password Field are required</div>";
            return $msg;
        }
    
        $result = $this->getLoginUser($DoctorID,$password);
        
        if($result){
            session::init();
            session::set("Login",true);
            session::set("DoctorID",$result->DoctorID);
            session::set("DoctorName",$result->DoctorName);
            session::set("email",$result->email);
            session::set("Address",$result->Address);
            session::set("ContactNumber",$result->ContactNumber);
            session::set("password",$result->password);
            session::set("categorey",$result->categorey);
            session::set("timing",$result->timing);
            session::set("visit",$result->visit);
            session::set("images",$result->images);
            header('location:indexD.php');
        }else{
            $msg="<div class='btn btn-danger'>The DoctorID/Password not correct</div>";
            return $msg;
        }   
    }


    public function UpdateUser($userdID, $data){
       
        $DoctorName 	  = $data['DoctorName'];
        $Address 	      = $data['Address'];
        $ContactNumber	  = $data['ContactNumber'];
        $email 		      = $data['email'];
        $categorey 	      = $data['categorey'];
        $timing 	      = $data['timing'];
        $visit 	          = $data['visit'];
        $images         = $_FILES['images']['name'];
        $filetmpname      = $_FILES['images']['tmp_name'];
       
        $folder           = 'images/';
    
        move_uploaded_file($filetmpname,$folder.$images); 
    
    
        
    
        if( $DoctorName == '' OR $email == '' OR $Address == '' OR $ContactNumber ==''  OR $categorey == '' OR  $timing == '' OR  $visit == '' OR $images == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = "UPDATE doctor SET 
                           DoctorName    ='$DoctorName',
                           email         ='$email', 
                           Address       ='$Address',
                           ContactNumber ='$ContactNumber',
                           categorey     ='$categorey',
                           visit         ='$visit', 
                           timing        ='$timing', 
                           images        ='$images' 
                           WHERE DoctorID ='$userdID' ";

            $query = $this->db->pdo->prepare($sql);               
            
             $result = $query->execute(['DoctorName'=>$DoctorName, 'email'=>$email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'categorey'=>$categorey,'visit'=>$visit,'timing'=>$timing, 'images'=>$images, 'DoctorID'=>$userdID,]);
    
             if($result){
                $_SESSION['success']="you are now logged in";
                header('location: profileD.php');
             
           }	   
    }
   
###################################################################################################################
##################################### Patient #####################################################################
         ///Patient Registration

      public function PatientRegistration($data){
        $PatientID 	      = $data['PatientID'];
        $Name 	          = $data['Name'];
        $Address 	      = $data['Address'];
        $ContactNumber	  = $data['ContactNumber'];
        $Email 		      = $data['Email'];
        $Password         = md5($data['Password']);
        $Bloodtype 	      = $data['Bloodtype'];
        $Images           = $_FILES['Images']['name'];
        $filetmpname      = $_FILES['Images']['tmp_name'];
       
        $folder           = 'images/';
    
        move_uploaded_file($filetmpname,$folder.$Images); 
    
    
        
    
        if($PatientID == '' OR $Name == '' OR $Address == '' OR $ContactNumber == '' OR $Email =='' OR $Password == '' OR $Bloodtype == ''  OR $Images == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = $this->db->pdo->prepare("INSERT INTO  patients (PatientID, Name, Address, ContactNumber, Email, Password,Bloodtype,Images) VALUES ('$PatientID','$Name','$Address','$ContactNumber','$Email','$Password','$Bloodtype','$Images')");
            
             $result = $sql->execute(['PatientID'=>$PatientID, 'Name'=>$Name, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'Email'=>$Email, 'Password'=>$Password,'Bloodtype'=>$Bloodtype,'Images'=>$Images,]);
    
             if($result){
                $_SESSION['success']="you are now logged in";
                header('location: loginP.php');
             
           }	   
      } 
      
      
      /// Patient Login Form
          

      public function getLoginPatient($PatientID,$Password){
        $sql=$this->db->pdo->prepare("SELECT * FROM patients WHERE PatientID='$PatientID' AND Password='$Password' LIMIT 1");
        $sql->execute(['PatientID'=>$PatientID,'Password'=>$Password,]);
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function patientLogin($data){

        $PatientID 	= $data['PatientID'];
        $Password 	= md5($data['Password']);
    
        if($PatientID == '' OR  $Password == ''){
            $msg="<div class='btn btn-danger'>PatientID and Password Field are required</div>";
            return $msg;
        }
    
        $result = $this->getLoginPatient($PatientID,$Password);
        
        if($result){
            session::init();
            session::set("LoginP",true);
            session::set("PatientID",$result->PatientID);
            session::set("Name",$result->Name);
            session::set("Address",$result->Address);
            session::set("ContactNumber",$result->ContactNumber);
            session::set("Email",$result->Email);
            session::set("Password",$result->Password);
            session::set("Bloodtype",$result->Bloodtype);
            session::set("Images",$result->Images);
            header('location:indexP.php');
        }else{
            $msg="<div class='btn btn-danger'>The PatientID/Password not correct</div>";
            return $msg;
        }   
    }


    /// patient update/edit

    public function UpdatePatient($userdID, $data){
        $PatientID 	      = $data['PatientID'];
        $Name 	          = $data['Name'];
        $Address	      = $data['Address'];
        $ContactNumber 	  = $data['ContactNumber'];
        $Email   	      = $data['Email'];
        $Bloodtype 	      = $data['Bloodtype'];
        $Images         = $_FILES['Images']['name'];
        $filetmpname      = $_FILES['Images']['tmp_name'];
       
        $folder           = 'images/';
    
        move_uploaded_file($filetmpname,$folder.$Images); 
    
    
        
    
        if( $Name == '' OR $Address == '' OR $ContactNumber == '' OR $Email ==''  OR $Bloodtype == '' OR   $Images == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = "UPDATE patients SET 
                           Name          ='$Name',
                           Address       ='$Address', 
                           ContactNumber ='$ContactNumber',
                           Email         ='$Email',
                           Bloodtype     ='$Bloodtype', 
                           Images        ='$Images' 
                           WHERE PatientID ='$userdID' ";

            $query = $this->db->pdo->prepare($sql);               
            
             $result = $query->execute(['Name'=>$Name, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'Email'=>$Email, 'Bloodtype'=>$Bloodtype, 'Images'=>$Images, 'PatientID'=>$userdID,]);
    
             if($result){
                $_SESSION['success']="you are now logged in";
                header('location: profileP.php');
             
           }	   
    }

    /// Patient Apply Message
    public function PatientApply($DoctorID,$data){
        $PatientID 	      = $data['PatientID'];
        $Name 	          = $data['Name'];
        $Email 		      = $data['Email'];
        $ContactNumber	  = $data['ContactNumber'];
        $message	      = $data['message'];
       
        
       
    
        
    
        if($Name == '' OR  $ContactNumber == '' OR $Email ==''  OR $message == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = $this->db->pdo->prepare("INSERT INTO  patient_message (DoctorID,PatientID, Name, Email, ContactNumber, message) VALUES ('$DoctorID','$PatientID','$Name','$Email','$ContactNumber','$message')");
            
             $result = $sql->execute([ 'DoctorID'=>$DoctorID, 'PatientID'=>$PatientID,'Name'=>$Name, 'Email'=>$Email, 'ContactNumber'=>$ContactNumber,  'message'=>$message,]);
    
             if($result){
               
                header('location: doctor_profile.php');
             
           }	   
    }

    ////    Doctor Reply Message

    public function DoctorReply($PatientID,$data){
        $DoctorID 	      = $data['DoctorID'];
        $DoctorName 	  = $data['DoctorName'];
        $email 		      = $data['email'];
        $ContactNumber	  = $data['ContactNumber'];
        $reply_message	  = $data['reply_message'];
       
        
       
    
        
    
        if($DoctorName == '' OR  $ContactNumber == '' OR $email ==''  OR $reply_message == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = $this->db->pdo->prepare("INSERT INTO  doctor_reply (PatientID, DoctorID, DoctorName, email, ContactNumber, reply_message) VALUES ('$PatientID','$DoctorID','$DoctorName','$email','$ContactNumber','$reply_message')");
            
             $result = $sql->execute([ 'PatientID'=>$PatientID, 'DoctorID'=>$DoctorID,'DoctorName'=>$DoctorName, 'email'=>$email, 'ContactNumber'=>$ContactNumber,  'reply_message'=>$reply_message,]);
    
             if($result){
               
                header('location: inbox.php');
             
           }	   
    }


    // Patient Feedback
    public function PatientFeedback($DoctorID,$data){
        $PatientID 	      = $data['PatientID'];
        $Name 	          = $data['Name'];
        $Email 		      = $data['Email'];
        $feedback	      = $data['feedback'];
       
        
       
    
        
    
        if($Name == '' OR  $Email ==''  OR $feedback == ''){
            $msg="<div class='btn btn-danger'>All Field are required</div>";
            return $msg;
        }
            
    
        
             $sql = $this->db->pdo->prepare("INSERT INTO  patient_feedback (DoctorID, PatientID,  Name, Email, feedback) VALUES ('$DoctorID','$PatientID','$Name','$Email','$feedback')");
            
             $result = $sql->execute([ 'DoctorID'=>$DoctorID, 'PatientID'=>$PatientID, 'Name'=>$Name, 'Email'=>$Email,  'feedback'=>$feedback,]);
    
             if($result){
               
                header('location: inbox.php');
             
           }	   
    }



}

?>