<?php
	include '../includes/User.php';
    $user = new User();
    $password1 = session::get('password');
    $images1   = session::get('images');
    $DoctorID1  = session::get('DoctorID');

	if(isset($_POST['edit'])){

		//$DoctorID 	      = $_POST['DoctorID'];
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
	
        if(password_verify($curr_password, $password1)){
			if(!empty($images)){
				move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$images);
				$filename = $images;	
			}
			else{
				$filename = 'images/'.$images1;
			}

			if($password == $password1){
				$password = $password1;
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			try{
				$stmt = $db->pdo->prepare("UPDATE doctor SET DoctorName=:DoctorName, email=:email, Address=:Address, ContactNumber=:ContactNumber, password=:password, categorey=:categorey,  visit=:visit, timing=:timing, images=:images WHERE DoctorID=:DoctorID");
				$stmt->execute(['DoctorName'=>$DoctorName, 'email'=>$email, 'Address'=>$Address, 'ContactNumber'=>$ContactNumber, 'password'=>$password, 'categorey'=>$categorey, 'visit'=>$visit,'timing'=>$timing,'images'=>$filename, 'DoctorID'=>$DoctorID1]);

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
      /*  
		if(password_verify($curr_password, $password)){
			if(!empty($images)){
				move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$images);
				$images = $images;	
			}

			try{
               
				$stmt = $user->db->pdo->prepare("UPDATE doctor SET (DoctorName=('$DoctorName'),email=('$email'), Address=('$Address'),ContactNumber=('$ContactNumber'),password=('$password'),categorey=('$categorey'),visit=('$visit'), timing=('$timing'), images=('$images') WHERE DoctorID=('$DoctorID'))");

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


	

	header('location: profileD.php');*/

?>