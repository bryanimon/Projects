<div class="py-1 bg-primary">
	<div class="container">
		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
			<div class="col-lg-12 d-block">
				<div class="row d-flex">
					<div class="col-md pr-4 d-flex topper align-items-center">
						<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						<span class="text">0908 288 0619</span>
					</div>
					<div class="col-md pr-4 d-flex topper align-items-center">
						<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						<span class="text">fb.com/ACF-Store-2186481181441964</span>
					</div>
					<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						<span class="text">Free shipping / Cash on delivery</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.php">ACF PASALUBONG</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
				<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<?php
				if(isset($_SESSION['user-logged'])){
					if($_SESSION['user-logged'] == 1){
						echo '<li class="nav-item active dropdown">';
						echo '<a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $_SESSION['user-name'] . '</a>';
            echo '<div class="dropdown-menu" aria-labelledby="dropdown04">';
            echo '<a class="dropdown-item" href="edit-profile.php">Edit Profile</a>';
            echo '<a class="dropdown-item" href="orders.php">Orders</a>';
            echo '<a class="dropdown-item" href="includes/crud/user-logout.php">Logout</a>';
            echo '</div>';
						echo '</li>';

						include 'includes/crud/count-cart-items.php';

						echo '<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[' . $_SESSION['cart-item-count'] . ']</a></li>';
						}else{
							echo '<li class="nav-item"><a href="user-login.php" class="nav-link">Login</a></li>';
						}
					
				}else{
					echo '<li class="nav-item"><a href="user-login.php" class="nav-link">Login</a></li>';
				}
				
				?>
				
			</ul>
		</div>
	</div>
</nav>