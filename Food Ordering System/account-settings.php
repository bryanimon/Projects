<!DOCTYPE html>
<html lang="en">

<head>

	<?php 
		include 'includes/dbconnect.php';
		include 'includes/check-session.php';
	?>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACF Pasalubong Store System | Account Setting</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'includes/html/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'includes/html/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <div class="card shadow mb-4">
						<div class="card-header py-3">
							<h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa fa-cogs"></i> Account Settings</h3>
					 </div>
					 
					 <div class="card-body">
						 <div class="row">
							 <!-- Change Password -->
							 <div class="col-lg-6">
								 <div class="card shadow mb-4">
									 <div class="card-header py-3">
										 <h5 class="m-0 font-weight-bold text-primary">Change Password</h5>
									 </div>
									 <div class="card-body">
										 <form method="post" action="includes/crud/change-password.php">
											 <p><b>Current Password: </b></p>
											 <input type="password" class="form-control form-control-user" placeholder="Current Password" id="current-password" name="current-password" required><br>
											 <input type="hidden" value="<?php echo $_SESSION['password']; ?>" id="password_hash">
											 <p><b>New Password: (Min. 6 characters)</b></p>
											 <input type="password" class="form-control form-control-user" placeholder="New Password" id="new-password" name="new-password" required>
											 <hr>
											 <input class="form-control form-control-user btn btn-success" type="submit" value="Change Password" id="change-password" disabled>
										 </form>
									 </div>
								 </div>
							 </div>
							 <!-- Change Email -->
							 <div class="col-lg-6">
								 <div class="card shadow mb-4">
									 <div class="card-header py-3">
										 <h5 class="m-0 font-weight-bold text-primary">Email: </h5>
									 </div>
									 <div class="card-body">
										 <form method="post" action="includes/crud/change-email.php">
											 <p><b>Email: </b></p>
											 <input type="text" class="form-control form-control-user" placeholder="Current Email" name="email" required value="<?php echo $_SESSION['email']; ?>"><br>
											 <hr>
											 <input class="form-control form-control-user btn btn-success" type="submit" value="Change Email" id="add-product">
										 </form>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
        </div>
				</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

			<!-- Footer -->
      <?php include 'includes/html/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
	<?php include 'includes/html/logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
	
	<script>
		var validCurrentPassword = false;
		var validNewPassword = false;
		
		$('#current-password').on('input',function(e){
			var password = $('#current-password').val();
			var passwordHash = $('#password_hash').val();
			
			$.ajax({
					type: "POST",
					url: 'includes/crud/check-password.php',
					data: ({new:password, old:passwordHash}),
					dataType: 'json',
					success: function(data) {
						if(data == true){
							validCurrentPassword = true;
							toggleCurrentPassword(true);
						}else if(data == false){
							validCurrentPassword = false;
							toggleCurrentPassword(false);
						}else{
							//do nothing
						}
					},
					error: function(ts) {
						alert(ts.responseText);
					}  
				});
		});
		
		$('#new-password').on('input',function(e){
			var newPassword = $('#new-password').val();
			
			if(newPassword.length >= 6){
				validNewPassword = true;
			}else{
				validNewPassword = false;
			}
			
			validateChangePasswordButton();
		});
		
		function toggleCurrentPassword(flag){
			if(flag){
				$('#current-password').removeClass("border-bottom-danger");
				$('#current-password').addClass("border-bottom-success");
			}else{
				$('#current-password').removeClass("border-bottom-success");
				$('#current-password').addClass("border-bottom-danger");
			}
			
			validateChangePasswordButton();
		}
		
		function validateChangePasswordButton(){
			if(validCurrentPassword && validNewPassword){
				$('#change-password').removeAttr("disabled");
			}else{
				$('#change-password').prop("disabled", true);
			}
		}
	</script>

</body>

</html>
