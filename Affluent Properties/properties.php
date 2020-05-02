<!doctype html>
<?php 
	ob_start(); 
	include 'includes/dbconnect.php';
?>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Affluent Properties</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
	  <style>
		  li {display: inline;}
		  .hvrbox,.hvrbox * {
			  box-sizing: border-box;
		  }
		  .hvrbox {
			  position: relative;
			  display: inline-block;
			  overflow: hidden;
			  max-width: 100%;
			  height: auto;
		  }
		  .hvrbox img {
			  max-width: 100%;
		  }
		  .hvrbox .hvrbox-layer_bottom {
			  display: block;
		  }
		  .hvrbox .hvrbox-layer_top {
			  opacity: 0;
			  position: absolute;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  width: 100%;
			  height: 100%;
			  background: rgba(0, 0, 0, 0.6);
			  color: #fff;
			  padding: 15px;
			  -moz-transition: all 0.4s ease-in-out 0s;
			  -webkit-transition: all 0.4s ease-in-out 0s;
			  -ms-transition: all 0.4s ease-in-out 0s;
			  transition: all 0.4s ease-in-out 0s;
		  }
		  .hvrbox:hover .hvrbox-layer_top,
		  .hvrbox.active .hvrbox-layer_top {
			  opacity: 1;
		  }
		  .hvrbox .hvrbox-text {
			  text-align: center;
			  font-size: 18px;
			  display: inline-block;
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  -moz-transform: translate(-50%, -50%);
			  -webkit-transform: translate(-50%, -50%);
			  -ms-transform: translate(-50%, -50%);
			  transform: translate(-50%, -50%);
		  }
		  .hvrbox .hvrbox-text_mobile {
			  font-size: 15px;
			  border-top: 1px solid rgb(179, 179, 179); /* for old browsers */
			  border-top: 1px solid rgba(179, 179, 179, 0.7);
			  margin-top: 5px;
			  padding-top: 2px;
			  display: none;
		  }
		  .hvrbox.active .hvrbox-text_mobile {
			  display: block;
		  }
		  a{
			  text-decoration: none;
		  }
	  </style>
	</head>
	<body>
        <div class="container-fluid">
		<nav class="navbar navbar-default navbar-fixed-top" >
			<a href="index.php"><img src="images/logo.png" width="50%" height="250%" href="index.php"></a>
			<div style="padding-right: 150px;">
				<a href="index.php"><span style="font-family: Lato, Times, serif;padding-right: 40px;">HOME</span></a>
				<a href="index.php#contact" onclick="window.open('index.php#contact', '_self')" ><span style="font-family: Lato, Times, serif;padding-right: 40px;">CONTACT</span></a>
			</div>
		</nav>
		<div class="row">
			<?php 
				$isSaleChecked = "";
				$isRentChecked = "";
                $isQuezonCityFilterPressed = "";
                $isPasigFilterPressed = "";
                $isMakatiFilterPressed = "";
            
				if(isset($_GET['filter'])){
                    switch($_GET['filter']){
                        case "all-rent":
                            $isRentChecked = "checked";
                            break;
                        case "all-sale":
                            $isSaleChecked = "checked";
                            break;
                        case "quezon-city":
                            $isQuezonCityFilterPressed = "checked";
                            break;
                        case "pasig":
                            $isPasigFilterPressed = "checked";
                            break;
                        case "makati":
                            $isMakatiFilterPressed = "checked";
                            break;
                        default:
                            break;
                    }
				}
			?>
			<div class="col-md-3">
				<div id="navigation">
					<section id="inquiries" class="p-3">
						<form method="GET">
                            <h5 class="animated fadeInLeft">Category</h5>
							<input type="checkbox" name="cb_category[]" value="house-and-lot">House and Lot
							<input type="checkbox" name="cb_category[]" value="lot-only" style="margin-left: 10px">Lot only
							<h5 class="animated fadeInLeft">Status</h5>
							<?php echo "<input type='checkbox' name='cb_status[]' value='for-sale' ".$isSaleChecked.">For Sale"; ?>
							<?php echo "<input type='checkbox' name='cb_status[]' value='for-rent' ".$isRentChecked.">For Rent"; ?>
							<h5 class="animated fadeInLeft">Locations</h5>
							<?php echo "<input type='checkbox' name='cb_loc[]' value='loc-makati' ".$isMakatiFilterPressed.">Makati<br>"; ?>
							<input type="checkbox" name="cb_loc[]" value="loc-taguig">Taguig<br>
							<?php echo "<input type='checkbox' name='cb_loc[]' value='loc-pasig' ".$isPasigFilterPressed.">Pasig<br>"; ?>
							<?php echo "<input type='checkbox' name='cb_loc[]' value='loc-quezon-city' ".$isQuezonCityFilterPressed.">Quezon City<br>"; ?>
							<input type="checkbox" name="cb_loc[]" value="loc-alabang">Alabang<br>
							<h5 class="animated fadeInLeft">Bedrooms</h5>
							<select name="bedroom_count" style="width: 50%;">
								<option value="All">All</option>
								<option value="1">1 Bedroom</option>
								<option value="2">2 Bedrooms</option>
								<option value="3">3 Bedrooms</option>
								<option value="4">4 Bedrooms</option>
                                <option value="5">5 Bedrooms</option>
                                <option value="6">6 Bedrooms</option>
                                <option value="7">7 Bedrooms</option>
							</select>
							<h5 class="animated fadeInLeft">Price Range</h5>
							<input type="number" name="price_range_min" placeholder="0" style="width: 25%" step="50000" min="0" max="50000000"> to
							<input type="number" name="price_range_max" placeholder="max" style="width: 25%" step="50000" min="0" max="50000000"><br>
							<br>
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
						</form>
					</section>
				</div>
			</div>
			<?php
				$property_category = [];
				$property_status = [];
				$property_location = [];
				$min_price = 0;
				$max_price = 500000000;
				$num_bedroom = 0;
			
				if(isset($_GET['filter'])){
					array_push($property_category,"house-and-lot");
					array_push($property_category, "lot-only");
                    
                    if($_GET['filter'] == "all-rent" || $_GET['filter'] == "all-sale"){
                        array_push($property_location,"loc-makati");
				        array_push($property_location,"loc-taguig");
				        array_push($property_location,"loc-pasig");
				        array_push($property_location,"loc-quezon-cty");
				        array_push($property_location,"loc-alabang");

                        if($_GET['filter'] == "all-rent"){
                            array_push($property_status,"for-rent");
                        }else if($_GET['filter'] == "all-sale"){
                            array_push($property_status, "for-sale");
                        }
                    }else{
                        array_push($property_status,"for-rent");
                        array_push($property_status,"for-sale");
                        
                        switch($_GET['filter']){
                            case "quezon-city":
                                array_push($property_location,"loc-quezon-cty");
                                break;
                            case "pasig":
                                array_push($property_location,"loc-pasig");
                                break;
                            case "makati":
                                array_push($property_location,"loc-makati");
                                break;
                            default:
                                break;
                        }
                    }
				}else if(isset($_GET['search'])){
					if(isset($_GET['cb_category'])){
						foreach ($_GET['cb_category'] as $selected) {
							array_push($property_category, $selected);
						}
					}else{
						array_push($property_category,"house-and-lot");
						array_push($property_category, "lot-only");
					}
					
					if(isset($_GET['cb_status'])){
						foreach ($_GET['cb_status'] as $selected) {
							array_push($property_status, $selected);
						}
					}else{
						if($isRentChecked == "checked"){
							array_push($property_status,"for-rent");
						}else if($isSaleChecked == "checked"){
							array_push($property_status, "for-sale");
						}else{
							array_push($property_status, "for-rent");
							array_push($property_status, "for-sale");
						}
					}

					if(isset($_GET['cb_loc'])){
						foreach ($_GET['cb_loc'] as $selected) {
							array_push($property_location, $selected);
						}
					}else{
						array_push($property_location,"loc-makati");
						array_push($property_location,"loc-taguig");
						array_push($property_location,"loc-pasig");
						array_push($property_location,"loc-quezon-cty");
						array_push($property_location,"loc-alabang");
					}
					
					if(isset($_GET['bedroom_count'])){
						if($_GET['bedroom_count'] == "All"){
							$num_bedroom = 0;
						}else{
							$num_bedroom = (int)$_GET['bedroom_count'];
						}
					}else{
						$num_bedroom = 0;
					}
					
					if(isset($_GET['price_range_min'])){
						$min_price = (int)$_GET['price_range_min'];
					}
					
					if(isset($_GET['price_range_max'])){
						$max_price = (int)$_GET['price_range_max'];
						if($max_price == 0){
							$max_price = 500000000;
						}
					}
					
					if(isset($_GET['bedroom_count'])){
						if($_GET['bedroom_count'] == "All"){
							$num_bedroom = 0;
						}
					}
				}

				$i_property_category = implode("','", $property_category);
				$i_property_status = implode("','", $property_status);
				$i_property_location = implode("','", $property_location);
			?>
			<div class="col-md-8">
				<main role="main">
					<div class="album py-5 bg-light">
						<div class="container">
							<div class="row" style="min-height: 500px;">
								<?php
									$sql = "SELECT * FROM properties WHERE category IN ('".$i_property_category."') AND status IN ('".$i_property_status."') AND location IN ('".$i_property_location."') AND price >=".$min_price." AND price <=".$max_price." AND num_bedroom >=".$num_bedroom;
									$result = mysqli_query($conn, $sql);
									$numResults = mysqli_num_rows($result);
                                
									if($numResults <= 0){
										echo "<div class='col-md-4'>No results found.</div>";
									}else{
										while($row = mysqli_fetch_assoc($result)){
											echo "<div class='col-md-4'><div class='card mb-4 box-shadow'><div class='hvrbox'><a href='property_details.php?id=".$row['id']."'>";
											echo "<img"." src='images/uploads/".$row['directory_name']."/".$row['profile_image']."' alt='Mountains' class='hvrbox-layer_bottom' style='min-height: 250px;max-height: 250px;'>";
											echo "<div class='hvrbox-layer_top'>";
											echo "<div class='hvrbox-text'>More Details</div>";
											echo "</div>";
											echo "</a></div>";
											echo "<div class='card-body'>";
											echo "<p class='card-text'>";
											echo $row['property_name'];
											echo "</p>";
											echo "</div>";	
											echo "</div></div>";	
										}
									}
								?>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
            </div>
		    <footer class="py-5 bg-dark">
      	<div class="container">
        	<p class="m-0 text-center text-white">Copyright &copy; Affluent Properties 2018</p>
      	</div>
      	<!-- /.container -->
    	</footer>
            
		<!-- Bootstrap core JavaScript================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="assets/js/vendor/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="assets/js/vendor/holder.min.js"></script>
	</body>
</html>
