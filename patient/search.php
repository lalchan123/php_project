<?php 
include '../includes/User.php';
include '../includeD/header.php'; 
$user = new User();

?>

<?php

  if(isset($_GET['search'])){
         $search = $_GET['search'];
  }

?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includeD/navbar.php'; ?>
	
	 
	<div class="content-wrapper">
	<div class="container">
	    <div class="container">
		<div class="searchbtn clear pull-right">
               <form action="search.php" method="get">
                    <input type="text" name="search" class="btn btn-success" placeholder="Search Doctor">
                    <input type="submit" name="submit" class="btn btn-success" value="Search">
               </form>
          </div> 

		<h2>Doctor Profile</h2>
		<section class="content">
	        <div class="row">
	        	<div class="col-sm-12">

					<!--For Search -->
					<?php
					      
							try{
		       			 	$inc = 3;	
							$stmt = $user->db->pdo->prepare("SELECT * FROM doctor WHERE DoctorName LIKE '%$search%' OR ContactNumber LIKE '%$search%' OR categorey LIKE '%$search%'");

							 $stmt->execute();
                             foreach ($stmt as $row){
								
						    	$image = (!empty($row['images'])) ? '../doctor/images/'.$row['images'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
								if($inc == 1) echo "<div class='row'>";
	       						echo "
								   
							    <div class='col-sm-4'>
                                   <div class='box box-solid'>
                                       <div class='box-body prod-body  '>
                                           <img src='".$image."' width='100%' height='100%' class='thumbnail'> 
									   </div>
									   <div class='box-body text-align:center '>
											<h4>"." Name: ".$row['DoctorName']."</h4>
											<h4>"." Category: ".$row['categorey']."</h4>
											<h4>"." Email: ".$row['email']."</h4>
											<h4>"." Contact No: ".$row['ContactNumber']."</h4>
											<h4>"." Visit Fee: ".$row['visit']."</h4>
									   </div>
                                   </div>
							   </div>
							   ";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div><///div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
                         }
                        
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						
					?>

                        



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