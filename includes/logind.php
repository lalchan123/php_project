<?php
include 'session.php';
$errors=array();

#doctor login form php code start


if (isset($_POST['LoginD'])) {

    $conn = $pdo->open();

    $DoctorID 	= $_POST['doctorID'];
    $Password 	= $_POST['doctorpassword'];

    if (empty($DoctorID)) {
            array_push($errors,"DoctorID is required");
            # code...
        }
    if (empty($Password)) {
            array_push($errors,"Password is required");
           # code...
        }


    if (count ($errors)== 0) {

            $Password=md5($Password);
    
        $sql=$conn->prepare("SELECT *,COUNT(*) AS numrows FROM doctor WHERE DoctorID=('$DoctorID') AND password=('$Password')");
        $sql->execute(['DoctorID'=>$DoctorID,'password'=>$Password,]);
        $row = $sql->fetch();
       
         if ($row['numrows'] ==1 )  {

            if($row['type']){
                $_SESSION['patient'] = $row['DoctorID'];
            }
            else{
                $_SESSION['doctor'] = $row['DoctorID'];
            }

                
            
               /* if(isset($_SESSION['doctorD'])){

                       $stmt = $conn->prepare("SELECT * FROM doctor WHERE DoctorID= ($DoctorID)");
                        $stmt->execute(['DoctorID'=>$_SESSION['doctorD']]);
                        $doctorD = $stmt->fetch();
                        $conn = $pdo->open();
                     try{
			              $stmt = $conn->prepare("SELECT * FROM doctor WHERE DoctorID=($DoctorID)");
			              $stmt->execute(['DoctorID'=>$_SESSION['doctorD']]);
                          $doctorD = $stmt->fetch();
                          $_SESSION['success']="you are now logged in";
                         # header('location:indexD.php');
                        }
		            catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                        }
                       
                }*/
               
            }  
        else{
            array_push($errors,"The ID/Password not correct");
        }
     }
}


# doctor login form php code end

?>