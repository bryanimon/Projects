<!DOCTYPE html>
<html lang="en">
  <head>
		
		<?php
		session_start();
		
		include 'includes/dbconnect.php';
		include 'includes/crud/get-all-orders-by-id.php';
		include 'includes/crud/check-user-session.php';
		
		?>
		
    <title>ACF Pasalubong | Orders</title>
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/5bg.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Orders</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Order Code</th>
						        <th>Items</th>
										<th>Total</th>
						        <th>Date Ordered</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
									
									<?php
									if(isset($GLOBALS['orders'])){
										$count = count($GLOBALS['orders']);
										
										for($i = 0; $i < count($GLOBALS['orders']); $i++){
											echo '<tr class="text-center">';
											echo '<td style="min-width: 200px;">' . $GLOBALS['orders'][$i]['DeliveryCode'] . '</td>';
											echo '<td>';
											echo '<div class="row" style="border: 2px solid lightgray; padding-top: 20px;">';
											echo  htmlspecialchars_decode($GLOBALS['orders'][$i]['OrderList']);
											echo '</div>';
											echo '</td>';
											echo '<td style="min-width: 100px;">PHP ' . number_format($GLOBALS['orders'][$i]['Total']) . '</td>';
											echo '<td style="min-width: 250px;">' . date("F j, Y | h:i A", strtotime($GLOBALS['orders'][$i]['DateOrdered'])) . '</td>';
											echo '<td style="min-width: 100px;">' . $GLOBALS['orders'][$i]['Status'] . '</td>';
											echo '</tr>';
										}
									}
									?>
						    </tbody>
								
						  </table>
					  </div>
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
    
  </body>
</html>