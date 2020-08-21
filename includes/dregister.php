<?php
include 'conn.php';
session_start();
$errors=array();

#Doctor register form php code start

if (isset($_POST['DRegister'])) {

    /*
        $DoctorID 	      = $mysqli -> real_escape_string($_POST['addID']);
        $Doctorname 	  = $mysqli -> real_escape_string($_POST['addname']);
        $Address 	      = $mysqli -> real_escape_string($_POST['addAddress']);
        $ContactNumber	  = $mysqli -> real_escape_string($_POST['addContactNumber']);
        $Email 		      =  $mysqli -> real_escape_string($_POST['addEmail']);
        $Password         = $mysqli -> real_escape_string($_POST['addpassword']);
        $category 	      = $mysqli -> real_escape_string($_POST['addcategory']);
        $timing 	      = $mysqli -> real_escape_string($_POST['addtiming']);
        $filename         = $_FILES['addfile']['name'];
        $filetmpname      = $_FILES['addfile']['tmp_name'];
       
        $folder           = 'imagesfolder/';
    
        move_uploaded_file($filetmpname,$folder.$filename); */
    
        $conn = $pdo->open();
    
        $DoctorID 	      = $_POST['addID'];
        $Doctorname 	  = $_POST['addname'];
        $Address 	      = $_POST['addAddress'];
        $ContactNumber	  = $_POST['addContactNumber'];
        $Email 		      = $_POST['addEmail'];
        $Password         = $_POST['addpassword'];
        $category 	      = $_POST['addcategory'];
        $timing 	      = $_POST['addtiming'];
        $filename         = $_FILES['addfile']['name'];
        $filetmpname      = $_FILES['addfile']['tmp_name'];
       
        $folder           = 'imagesfolder/';
    
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
    
    
        if (empty($Email)) {
               array_push($errors,"Email is required");
                # code...
            }
    
        if (empty($Password)) {
               array_push($errors,"Password is required");
               # code...
            }
    
        if (empty($category)) {
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
    
    
             $Password=md5($Password);
    /*
             $sql = "INSERT INTO  doctor (DoctorID, Doctorname, email, Address, ContactNumber, password,categorey,timing,images) VALUES ('$DoctorID','$Doctorname','$Email','$Address','$ContactNumber','$Password','$category','$timing','$filename') ";*/
    
    
             $sql = $conn->prepare("INSERT INTO  doctor (DoctorID, Doctorname, email, Address, ContactNumber, password,categorey,timing,images) VALUES ('$DoctorID','$Doctorname','$Email','$Address','$ContactNumber','$Password','$category','$timing','$filename') ");
            
             $sql->execute(['DoctorID'=>$DoctorID, 'Doctorname'=>$Doctorname, 'email'=>$Email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'password'=>$Password,'categorey'=>$categorey,'timing'=>$timing,'images'=>$filename,]);
    
    
            if (!$conn -> query($sql)) {
                 printf("%d Row inserted.\n", $conn->affected_rows);
                }
    
            if(move_uploaded_file($_FILES['']))
    
    
            $_SESSION['doctorD']=$DoctorID;
            $_SESSION['success']="you are now logged in";
            header('location: login2.php');
    
        }
           # code...
    
    }
    #Doctor register form php code end
    
?>