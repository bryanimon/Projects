<!DOCTYPE html>
<html lang="en">
  <head>
		
		<?php
		session_start();
		
		include 'includes/dbconnect.php';
		include 'includes/crud/get-all-items-from-cart.php';
		include 'includes/crud/check-user-session.php';
		
		?>
		
    <title>ACF Pasalubong | Cart</title>
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
            <h1 class="mb-0 bread">My Cart</h1>
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
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
									
									<?php
									if(isset($GLOBALS['cart-items'])){
										$count = count($GLOBALS['cart-items']);
										
										for($i = 0; $i < count($GLOBALS['cart-items']); $i++){
											echo '<tr class="text-center">';
											echo '<td class="product-remove"><a href="#" onclick="removeItem('. $GLOBALS['cart-items'][$i]['CartItemID'] .')";><span class="ion-ios-close"></span></a></td>';

											echo '<td class="image-prod"><div class="img" style="background-image:url(img/' . $GLOBALS['cart-items'][$i]['ProductThumbnail'] . ');"></div></td>';
											echo '<td class="product-name">';
											echo '<h3>' . $GLOBALS['cart-items'][$i]['ProductName'] . '</h3>';
											echo '<p>' . $GLOBALS['cart-items'][$i]['ProductDescription'] .'</p>';
											echo '</td>';

											echo '<td class="price">PHP ' . $GLOBALS['cart-items'][$i]['ProductPrice'] . '</td>';

											echo '<td class="quantity">';
											echo '<div class="input-group mb-3">';
											echo '<input type="number" name="quantity" class="quantity form-control" id="quantity-field-id-'. $GLOBALS['cart-items'][$i]['CartItemID'] . '" input-number" value="' . $GLOBALS['cart-items'][$i]['count'] . '" min="1" max="1000" onchange="updateItemQuantity(' . $GLOBALS['cart-items'][$i]['CartItemID'] . ',' . $GLOBALS['cart-items'][$i]['ProductPrice'] . ');">';

											echo '</div>';
											echo '</td>';

											echo '<td class="total">PHP <span class="items-cart-total" id="total-field-id-' . $GLOBALS['cart-items'][$i]['CartItemID'] . '">' . ($GLOBALS['cart-items'][$i]['count'] * $GLOBALS['cart-items'][$i]['ProductPrice']) .'</span></td>';
											echo '</tr>';
										}
									}
									?>
						    </tbody>
						  </table>
							<?php
							
							if($count <= 0){
								echo '<div>';
								echo '<br>';
								echo '<center><h5>Your cart is empty!</h5></center>';
								echo '<br>';
								echo '<center><a href="shop.php" class="btn btn-primary btn-sm py-3 px-4">Go Shopping Now</a></center>';
								echo '<br>';
								echo '</div>';
							}
							
							?>
							
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end" id="checkout-details-box">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span id="cart-total-amount"></span>
    					</p>
							<p class="d-flex">
    						<span>Delivery</span>
    						<span>PHP 0</span>
    					</p>
							<p class="d-flex">
    						<span>Discount</span>
    						<span>PHP 0</span>
    					</p>
    				</div>
						<a id="checkout-button" href="checkout.php" class="btn btn-primary py-3 px-4" style="color:white">Proceed to Checkout</a>
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
    
    <script>
			updateTotal();
			
      function removeItem(index){
        var itemIndex = index;
				
        $.ajax({
					type: "POST",
					url: 'includes/crud/delete-cart-item.php',
					data: ({index:itemIndex}),
					dataType: 'json',
					success: function(data) {
						
						if(data != "NONE"){
							window.location.href='cart.php';
						}
					},
					
					error: function(ts) {
            alert(ts.responseText);
    			}  
				});
      }
      
      function updateItemQuantity(id, price){
				var fieldID = "#quantity-field-id-" + id;
				var totalID = "#total-field-id-" + id;
				
				var quantity = $(fieldID).val();
				
				var total = parseInt(price) * parseInt(quantity);
				$(totalID).html(total);
				
				
				$.ajax({
					type: "POST",
					url: 'includes/crud/update-cart-item-quantity.php',
					data: ({id:id, count:quantity}),
					dataType: 'json',
					success: function(data) {
						if(data != "NONE"){
							updateTotal();
						}
					},
					
					error: function(ts) {
            alert(ts.responseText);
    			}  
				});
      }
			
			function updateTotal(){
				var total = 0;
				
				$(".items-cart-total").each(function() {
					total += parseInt($(this).html());
				});
				
				if(total > 0){
					$('#checkout-button').show();
					$('#checkout-details-box').show();
				}else{
					$('#checkout-button').hide();
					$('#checkout-details-box').hide();
				}
				
				$("#cart-total-amount").html("PHP " + total);
			}
    </script>
    
  </body>
</html>