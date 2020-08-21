<?php 
include '../includes/User.php';
include '../includes/header.php'; 
$user = new User();
$DoctorID = session::get('DoctorID');
?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../includes/navbar.php'; ?>
	 
	<div class="content-wrapper">
	<div class="container">
	    <div class="container">
		
		 <!-- Content Header (Page header) -->
	<section class="content-header">
      <h1>
        Feedback
      </h1>
	  <?php 
						if(isset($_GET['delid'])){
							$delid = $_GET['delid'];
							$query = "DELETE from patient_feedback Where id ='$delid'";
							$sql = $user->db->pdo->prepare($query);
							$sql->execute(['id'=>$delid,]);
					
					}
                ?>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Serial No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Feedback</th>
                  <th>Date Added</th>
                  <th>Action</th>
                </thead>
                <tbody>
				
                 <?php
                      $stmt = $user->db->pdo->prepare("SELECT * FROM patient_feedback WHERE DoctorID='$DoctorID' AND status='0' order by id DESC");
					  $stmt->execute(['DoctorID'=>$DoctorID]);
					  $i=1;
					  foreach($stmt as $row){
					  
				  ?>
                        
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo $user->fm->textShorten($row['feedback'],30); ?></td>
                            <td><?php echo $user->fm->formatDate($row['date']); ?></td>
							<td>
							   <a href="viewfeedback.php?msgid=<?php echo $row['id'];?>">View</a>||
                               <a onclick="return confirm('Are you sure to delete?'); " href="?delid=<?php echo $row['id'];?>">Delete</a>
							</td>
                          </tr>
					  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
		
     </div>
  </div> 
  <?php include '../includes/profile_modal.php'; ?>	
</div>

<?php include '../includes/scripts.php'; ?>

</body>
</html>