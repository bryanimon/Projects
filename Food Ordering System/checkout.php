<!DOCTYPE html>
<html lang="en">
  <head>
		
		<?php
		session_start();
		
		include 'includes/dbconnect.php';
		include 'includes/crud/get-all-items-from-cart.php';
		include 'includes/crud/check-user-session.php';
		
		?>
		
    <title>ACF Pasalubong</title>
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
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

		<form method="post" action="includes/crud/place-order.php">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						<div class="row">
							<div class="col-md-3"><b>Name</b></div>
							<div class="col-md-3"><b>Price</b></div>
							<div class="col-md-3"><b>Quantity</b></div>
							<div class="col-md-3"><b>Total</b></div>
						</div>
						<hr>
						
						<div class="row align-items-end">
							
						<?php
						if(isset($GLOBALS['cart-items'])){
							$cartTotal = 0;
							$total = 0;
							
							$html = "";
							$countData = array();
							
							for($i = 0; $i < count($GLOBALS['cart-items']); $i++){
								$countDataItem = array();
								
								$countDataItem[] = $GLOBALS['cart-items'][$i]['ProductID'];
								$countDataItem[] = $GLOBALS['cart-items'][$i]['count'];
								
								$html = $html . '<div class="col-md-3">';
								$html = $html . '<p>' . $GLOBALS['cart-items'][$i]['ProductName'] .'</p>';
								$html = $html . '</div>';
								$html = $html . '<div class="col-md-3">';
								$html = $html . '<p>PHP ' . number_format($GLOBALS['cart-items'][$i]['ProductPrice']) .'</p>';
								$html = $html . '</div>';
								$html = $html . '<div class="col-md-3">';
								$html = $html . '<p>' . $GLOBALS['cart-items'][$i]['count'] .'</p>';
								$html = $html . '</div>';
								$html = $html . '<div class="col-md-3">';
								
								$total = $GLOBALS['cart-items'][$i]['ProductPrice'] * $GLOBALS['cart-items'][$i]['count'];
								
								$html = $html . '<p>PHP ' . number_format($total) .'</p>';
								$html = $html . '</div>';
								
								$cartTotal = $cartTotal + $total;
								
								$countData[] = $countDataItem;
							}
							
							$_SESSION['count-data'] = $countData;
							
							echo $html;
						}
						?>
						</div>
						
						<input type="hidden" value="<?php echo htmlspecialchars($html); ?>" name="order-list">
						<input type="hidden" value="<?php echo $cartTotal; ?>" name="order-total">
						<input type="hidden" value="Online" name="order-location">
					</div>
					
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>PHP <?php echo $cartTotal;?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>PHP 0</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>PHP 0</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>PHP <?php echo $cartTotal;?></span>
		    					</p>
								</div>
	          	</div>
							
							<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Delivery Address</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><?php echo $_SESSION['user-address']; ?></label>
											</div>
										</div>
									</div>
								</div>
	          	</div>
							
							<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Shipping Option</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" class="mr-2" name="shipping-option" checked="checked" value="Delivery"> Delivery</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="shipping-option" class="mr-2"  value="Pickup"> For Pickup</label>
											</div>
										</div>
									</div>
								</div>
	          	</div>
							
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" class="mr-2" checked="checked"> Cash on Delivery</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" class="mr-2" disabled> Credit Card</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2" id="terms-checkbox"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<input type="submit" class="btn btn-primary py-3 px-4" value="Place an order" id="place-order-button" disabled>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
			</form>
		
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
			$("#terms-checkbox").click(function(){
				if($(this).is(":checked")){
					
					$('#place-order-button').removeAttr("disabled");
				}
				else if($(this).is(":not(:checked)")){
					$('#place-order-button').prop("disabled", true);
				}

			});
		
	</script>
  </body>
</html>