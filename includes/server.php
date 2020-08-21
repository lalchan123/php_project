<?php
include 'conn.php';
session_start();
$errors=array();
$conn = $pdo->open();

#Doctor register form php code start

if (isset($_POST['DRegister'])) {

    $conn = $pdo->open();

    $DoctorID 	      = $_POST['DoctorID'];
	$Doctorname 	  = $_POST['Doctorname'];
	$Address 	      = $_POST['Address'];
	$ContactNumber	  = $_POST['ContactNumber'];
	$email 		      = $_POST['email'];
	$password         = $_POST['password'];
    $categorey 	      = $_POST['categorey'];
    $timing 	      = $_POST['timing'];
    $visit 	          = $_POST['visit'];
    $filename         = $_FILES['images']['name'];
    $filetmpname      = $_FILES['images']['tmp_name'];
   
    $folder           = 'images/';

    move_uploaded_file($filetmpname,$folder.$filename); 


	if (empty($DoctorID)) {
	          array_push($errors,"DoctorID is required");
              # code...
             }

    if (empty($Doctorname)) {
	          array_push($errors,"Doctorname is required");
              # code...
            }


    if (empty($Address)) {
            array_push($errors,"Address is required");
            # code...
        }

    if (empty($ContactNumber)) {
            array_push($errors,"Contact Number is required");
            # code...
        } 


    if (empty($email)) {
           array_push($errors,"Email is required");
            # code...
        }

    if (empty($password)) {
           array_push($errors,"Password is required");
           # code...
        }

    if (empty($categorey)) {
           array_push($errors,"category is required");
           # code...
        }
    if (empty($timing)) {
            array_push($errors,"timing is required");
            # code...
         }    

    if (empty($filename)) {
            array_push($errors,"filename is required");
            # code...
         }     

    if(count($errors)==0){


         $password=md5($password);

    
         $sql = $conn->prepare("INSERT INTO  doctor (DoctorID, Doctorname, email, Address, ContactNumber, password,categorey,timing,visit,images) VALUES ('$DoctorID','$Doctorname','$email','$Address','$ContactNumber','$password','$categorey','$timing','$visit','$filename')");
        
         $result = $sql->execute(['DoctorID'=>$DoctorID, 'Doctorname'=>$Doctorname, 'email'=>$email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'password'=>$password,'categorey'=>$categorey,'timing'=>$timing,'visit'=>$visit,'images'=>$filename,]);

         if($result){
            $_SESSION['doctorD']=$DoctorID;
            $_SESSION['success']="you are now logged in";
            header('location: login2.php');
         }
    }	   
}
#Doctor register form php code end


#doctor login form php code start


if (isset($_POST['LoginD'])) {

    $DoctorID 	= $_POST['DoctorID'];
    $password 	= $_POST['password'];

    if (empty($DoctorID)) {
            array_push($errors,"DoctorID is required");
            # code...
        }
    if (empty($password)) {
            array_push($errors,"Password is required");
           # code...
        }
       

    if (count($errors) == 0) {

       $password=md5($password);
    
        $sql=$conn->prepare("SELECT * FROM doctor WHERE DoctorID='$DoctorID' AND password='$password'");
        
         $result = $sql->execute(['DoctorID'=>$DoctorID,'password'=>$password,]);
        //$sql->execute(['DoctorID'=>$DoctorID,'password'=>$password,]);
        //$result =  $sql->fetch();
        //if (($result['DoctorID'] == $DoctorID) && ($result['password'] == $password ))
         
       
         if (($result['DoctorID'] == $DoctorID) && ($result['password'] == $password )){

    
                $_SESSION['DoctorID']=$DoctorID;
                $_SESSION['success']="you are now logged in";
                header('location:doctor_index.php');
               
            }else{
            array_push($errors,"The ID/Password not correct");
            }
     }
}


# doctor login form php code end



?>