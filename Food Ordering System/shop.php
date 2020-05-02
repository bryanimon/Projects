<!DOCTYPE html>
<html lang="en">
  <head>
		
		<?php
		session_start();
		include 'includes/crud/get-all-products-shop.php';
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
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
					<?php
						$numProducts = count($GLOBALS['products']);
						
						for($i = 0; $i < $numProducts; $i++){
							echo '<div class="col-md-6 col-lg-3 ftco-animate">';
							echo '<div class="product">';
							echo '<a href="" class="img-prod"><img class="img-fluid" src="img/' . $GLOBALS['products'][$i]['ProductThumbnail'] . '" onerror=this.src="img/no-image-available.png" style="width: 50vw; height:25vh;">';
							echo '<div class="overlay"></div>';
							echo '</a>';
							echo '<div class="text py-3 pb-4 px-3 text-center">';
							echo '<h3><a href="">' . $GLOBALS['products'][$i]['ProductName'] . '</a></h3>';
							echo '<div class="d-flex">';
							echo '<div class="pricing">';
							echo '<p class="price"><span>PHP ' . $GLOBALS['products'][$i]['ProductPrice'] .'</span></p>';
							echo '</div>';
							echo '</div>';
							echo '<div class="bottom-area d-flex px-3">';
							echo '<div class="m-auto d-flex">';
							echo '<a href="#" onclick="addToCart(' . $GLOBALS['products'][$i]['ProductID'] . ')" class="buy-now d-flex justify-content-center align-items-center mx-1">';
							echo '<span><i class="ion-ios-cart"></i></span>';
							echo '</a>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
					
					?>
    			
    		</div>
				<!--
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
				-->
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
			function addToCart(id){
				var productID = id;
				
				$.ajax({
					type: "POST",
					url: 'includes/crud/add-to-cart.php',
					data: ({id:productID}),
					dataType: 'json',
					success: function(data) {
						let html = "";
						
						if(data == "NONE"){
							alert("Login to add items to your cart");
							window.location.href='user-login.php';
						}else{
							location.reload();
						}
					},
					error: function(ts) {
            alert(ts.responseText);
    			}  
				});
			}
		</script>
    
  </body>
</html>