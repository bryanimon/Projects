<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ACF Pasalubong | Signup</title>
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
  </head>
  <body class="goto-here">
		<!-- Navbar -->
		<?php include 'includes/navbar.php'; ?>
		<!-- End of Navbar -->

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="includes/crud/add-user.php" method="post" class="bg-white p-5 contact-form signup-form">
							<h3>Sign Up</h3>
							<br>
							<div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="user-name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Address" name="user-email" id="user-email" required>
								<p style="color: red;display:none;" id="warning">This email address has already been used.</p>
              </div>
							<div class="form-group">
                <input type="text" class="form-control" placeholder="Contact Number" name="user-contact" id="user-contact" required>
              </div>
							<div class="form-group">
                <input type="text" class="form-control" placeholder="Delivery Address" name="user-address" id="user-adress" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password (Min. 6 characters)" name="user-password" id="user-password" required>
								<input type="checkbox" onclick="showPassword()" id="show-password">&nbsp;<label for="show-password">Show Password</label>
              </div>
							<hr>
              <div class="form-group">
                <input type="submit" value="Sign Up" class="btn btn-primary py-3 px-5" id="signup" disabled>
              </div>
            </form>
          </div>
          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
		<?php include 'includes/footer.php'; ?>
		<!-- End of Footer -->

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
			var uniqueEmail = false;
			var passwordValid = false; 
			
			$('#user-password').on('input',function(e){
				var text = $('#user-password').val();
				
				if(text.length >= 6){
					passwordValid = true;
				}else{
					passwordValid = false;
				}
				
				validateSignUpButton();
				
			});
			
			$('#user-email').on('input',function(e){
				var email = $('#user-email').val();
				
				$.ajax({
					type: "POST",
					url: 'includes/check-existing-email.php',
					data: ({email:email}),
					dataType: 'json',
					success: function(data) {
						var count = parseInt(data);
						
						if(count <= 0){
							uniqueEmail = true;
							$('#warning').css('display','none');
						}else{
							uniqueEmail = false;
							$('#warning').css('display','block');
						}
						
						validateSignUpButton();
					},
					error: function(ts) {
						//alert(ts.responseText);
					}  
				});
			});
			
			function showPassword(){
				var x = document.getElementById("user-password");
				
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
			
			function validateSignUpButton(){
				if(uniqueEmail && passwordValid){
					$('#signup').removeAttr("disabled");
				}else{
					$('#signup').prop("disabled", true);
				}
			}
		</script>
  </body>
</html>