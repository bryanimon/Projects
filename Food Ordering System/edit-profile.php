<!DOCTYPE html>
<html lang="en">
  <head>
		
		<?php
		session_start();
		
		include 'includes/dbconnect.php';
		include 'includes/crud/check-user-session.php';
		
		?>
		
    <title>ACF Pasalubong | Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
		
		<style>
			.old-password-error{
				color: #ae3d18;
			}
			.old-password-valid{
				color: green;
			}
		</style>
  </head>
  <body class="goto-here">
		
    <!-- Navbar -->
		<?php include 'includes/navbar.php'; ?>
		<!-- End of Navbar -->

			<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 ftco-animate">
						<h5>User Details:</h5>
						<hr>
						<form method="post" action="includes/crud/update-user-details.php">
							<label>Email</label>
							<input type="email" class="form-control" value="<?php echo $_SESSION['user-email']; ?>" name="email" required><br>
							<label>Name</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION['user-name']; ?>" name="name" required><br>
							<label>Address</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION['user-address']; ?>" name="address" required><hr>
							<label>Contact</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION['user-contact']; ?>" name="contact" required><hr>
							<center><input type="submit" class="btn btn-primary py-3 px-4" value="Update Profile"></center>
						</form>
					</div>
					<div class="col-xl-6 ftco-animate">
						<h5>Change Password:</h5>
						<hr>
						<form method="post" action="includes/crud/change-user-password.php">
							<label id="current-password-label">Current Password:</label>
							<input type="password" class="form-control " id="old-password" required><br>
							<label>New Password (Min. 6 Characters):</label>
							<input type="password" class="form-control" id="new-password" name="password">
							<input type="checkbox" onclick="showPassword()" id="show-password">&nbsp;<label for="show-password">Show Password</label>
							<hr>
							<center><input type="submit" class="btn btn-primary py-3 px-4" value="Change Password" id="change-password" disabled></center>
						</form>
					</div>
        </div>
      </div>
    </section> <!-- .section -->
		
    <!-- Footer -->
		<?php include 'includes/footer.php'; ?>
		<!-- End of Footer -->>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
	<script>
		var oldPassword = false;
		var passwordValid = false; 
		
		$("#terms-checkbox").click(function(){
			if($(this).is(":checked")){
				$('#place-order-button').removeAttr("disabled");
			}else if($(this).is(":not(:checked)")){
				$('#place-order-button').prop("disabled", true);
			}
		});
		
		$('#old-password').on('input',function(e){
			var text = $('#old-password').val();
			$.ajax({
					type: "POST",
					url: 'includes/crud/confirm-user-password.php',
					data: ({password:text}),
					dataType: 'json',
					success: function(data) {
						if(data != "NONE"){
							oldPassword = true;
							$('#current-password-label').removeClass('old-password-error');
							$('#current-password-label').addClass('old-password-valid');
						}else{
							oldPassword = false;
							$('#current-password-label').removeClass('old-password-valid');
							$('#current-password-label').addClass('old-password-error');
						}
						
						validateChangePasswordButton();
					},
					error: function(ts) {
						alert(ts.responseText);
					}  
				});
			});
		
		
		$('#new-password').on('input',function(e){
			var text = $('#new-password').val();
			
			if(text.length >= 6){
				passwordValid = true;
			}else{
				passwordValid = false;
			}
				
			validateChangePasswordButton();
		});
		
		function showPassword(){
				var x = document.getElementById("new-password");
				
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		
		function validateChangePasswordButton(){
				if(oldPassword && passwordValid){
					$('#change-password').removeAttr("disabled");
				}else{
					$('#change-password').prop("disabled", true);
				}
			}
		
	</script>
  </body>
</html>