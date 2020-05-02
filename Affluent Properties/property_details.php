<!DOCTYPE html>
<?php
	include 'includes/dbconnect.php';
    session_start();

	$id = "1";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$sql = "SELECT * FROM properties WHERE id = '".$id."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$arr4 = explode('/', $row['image_directories']);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="description" content="">
    	<meta name="author" content="">
		<title><?php echo "Affluent Properties | ".$row['property_name'];?></title>
		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/portfolio-item.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
  </head>

  <body>
	  <!-- Navigation -->
	  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		  <div class="container">
			  <a class="navbar-brand" href="#">Affluent Properties</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarResponsive">
				  <ul class="navbar-nav ml-auto">
					  <li class="nav-item active">
						  <a class="nav-link" href="index.php">Home
							  <span class="sr-only">(current)</span>
						  </a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="index.php#contact">Contact</a>
					  </li>
				  </ul>
			  </div>
		  </div>
	  </nav>
	  <!-- Page Content -->
	  <div class="container">
		  <!-- Portfolio Item Heading -->
		  <h1 class="my-4"><small><?php echo $row['property_name']; ?></small></h1>
		  <!-- Portfolio Item Row -->
		  <div class="row">
			  <div class="col-md-8">
				  <main role="main">
					  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
							  <?php
							  for($i = 1; $i < count($arr4); $i++){
								  echo "<li data-target='#myCarousel' data-slide-to='".$i."'></li>";
							  }
							  ?>
						  </ol>
						  <div class="carousel-inner">
							  <?php
							  for($i = 1; $i < count($arr4); $i++){
								  if($i == 1){
									  echo "<div class='carousel-item active'>";
								  }else{
									  echo "<div class='carousel-item'>";
								  }
								  echo "<img class='third-slide' src='". "images/uploads/".$row['directory_name']."/".$arr4[$i]."' alt='Card image cap'>";
								  echo "</div>";
							  }
							  ?>
						  </div>
						  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
							  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							  <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
							  <span class="carousel-control-next-icon" aria-hidden="true"></span>
							  <span class="sr-only">Next</span>
						  </a>
					  </div>
					  <!-- FOOTER -->
					  <footer class="container">
						  <p>&copy; 2017-2018 Affluent Properties. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
					  </footer>
				  </main>
			  </div>
			  <div class="col-md-4">
				  <h3 class="my-3">Project Description</h3>
				  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
				  <h3 class="my-3">Project Details</h3>
				  <ul>
					  <li>Lorem Ipsum</li>
					  <li>Dolor Sit Amet</li>
					  <li>Consectetur</li>
					  <li>Adipiscing Elit</li>
				  </ul>
			  </div>
		  </div>
		  <!-- Related Projects Row -->
		  <h3 class="my-4">Related Projects</h3>
		  <div class="row">
			  <div class="col-md-3 col-sm-6 mb-4">
				  <a href="#">
					  <img class="img-fluid" src="http://placehold.it/500x300" alt="">
				  </a>
			  </div>
			  <div class="col-md-3 col-sm-6 mb-4">
				  <a href="#">
					  <img class="img-fluid" src="http://placehold.it/500x300" alt="">
				  </a>
			  </div>
			  <div class="col-md-3 col-sm-6 mb-4">
				  <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Affluent Propeties 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/vendor/jquery-slim.min.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
