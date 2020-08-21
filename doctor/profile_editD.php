<?php
	include '../includes/User.php';
	$user = new User();

	if(isset($_POST['edit'])){

		$DoctorID 	      = $_POST['DoctorID'];
        $curr_password    = $_POST['curr_password'];
	    $DoctorName 	  = $_POST['DoctorName'];
	    $Address 	      = $_POST['Address'];
	    $ContactNumber	  = $_POST['ContactNumber'];
	    $email 		      = $_POST['email'];
	    $password         = $_POST['password'];
		$categorey 	      = $_POST['categorey'];
		$visit 	          = $_POST['visit'];
        $timing 	      = $_POST['timing'];
		$images           = $_FILES['images']['name'];
		$filetmpname      = $_FILES['images']['tmp_name'];

		$folder           = 'images/';

        move_uploaded_file($filetmpname,$folder.$images);
		
        
		$stmt = $db->pdo->prepare("SELECT * FROM doctor WHERE DoctorID=('$DoctorID')");
		$stmt->execute(['DoctorID'=>$DoctorID]);
		$row = $stmt->fetch(); 

		if(password_verify($curr_password, $row['password'])){
			if(!empty($images)){
				move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$images);
				$images = $images;	
			}
			else{
				$images = $row['images'];
			}

			if($password == $row['password']){
				$password = $row['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			try{
               
				$stmt = $db->pdo->prepare("UPDATE doctor SET (DoctorName=('$DoctorName'),email=('$email'), Address=('$Address'),ContactNumber=('$ContactNumber'),password=('$password'),categorey=('$categorey'),visit=('$visit'), timing=('$timing'), images=('$images') WHERE DoctorID=('$DoctorID'))");

                $stmt->execute(['DoctorName'=>$DoctorName, 'email'=>$email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'password'=>$password, 'categorey'=>$categorey,
                    'visit'=>$visit,'timing'=>$timing, 'images'=>$images, 'DoctorID'=>$DoctorID,]);
					$_SESSION['success'] = 'Account updated successfully';
					
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	

	header('location: profileD.php');

?>