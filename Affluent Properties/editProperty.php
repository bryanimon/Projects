<!DOCTYPE html>
<?php 
	ob_start(); 
	include 'includes/dbconnect.php';
	$id = "1";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$sql = "SELECT * FROM properties WHERE id = '".$id."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Affluent Propert | Admin | Edit Property</title>
		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/form-validation.css" rel="stylesheet">
	</head>
	<body class="bg-light">
		
		<div class="container">
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="http://www.affluentproperties.ph/wp-content/uploads/2016/07/Affluent-Logo-Transparent-200.png" alt="" width="200px">
				<h2>Edit Property Form</h2>
			</div>
			<div>
				<h4 class="mb-3">Property Details</h4>
				<form class="needs-validation"  method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12 mb-3">
							<label>Property Name</label>
							<?php echo "<input type='text' class='form-control' id='property-name' name='property-name' placeholder='' 							value='".$row['property_name']."' required>";
							?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label>Category</label>
							<?php
								$arr1 = array("","");
								
								if($row['category'] == "house-and-lot"){
									$arr1[0] = "selected";
								}else if($row['category'] == "lot-only"){
									$arr1[1] = "selected";
								}
								echo "<select class='custom-select d-block w-100' id='property-category' name='property-category' required>";
								echo "<option value=''>Choose...</option>";
								echo "<option value='house-and-lot' ".$arr1[0]." >House and Lot</option>";
								echo "<option value='lot-only' ".$arr1[1]." >Lot Only</option>";
								echo "</select>";
							?>
						</div>
						<div class="col-md-3 mb-3">
							<label>Location</label>
							<select class="custom-select d-block w-100" id="property-location" name="property-location" required>
								<option value="">Choose...</option>
								<?php
									$arr2 = array("","","","","");
								
									if($row['location'] == "loc-makati"){
										$arr2[0] = "selected";
									}else if($row['location'] == "loc-taguig"){
										$arr2[1] = "selected";
									}else if($row['location'] == "loc-pasig"){
										$arr2[2] = "selected";
									}else if($row['location'] == "loc-quezon-city"){
										$arr2[3] = "selected";
									}else if($row['location'] == "loc-alabang"){
										$arr2[4] = "selected";
									}
								echo "<option value='loc-makati' ".$arr2[0].">Makati</option>";
								echo "<option value='loc-taguig' ".$arr2[1].">Taguig</option>";
								echo "<option value='loc-pasig' ".$arr2[2].">Pasig</option>";
								echo "<option value='loc-quezon-city' ".$arr2[3].">Quezon City</option>";
								echo "<option value='loc-alabang' ".$arr2[4].">Alabang</option>";
								?>
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<label for="state">Status</label>
							<select class="custom-select d-block w-100" id="property-status" name="property-status" required>
								<option value="">Choose...</option>
								<?php
									$arr3 = array("","");
								
									if($row['status'] == "for-sale"){
										$arr3[0] = "selected";
									}else if($row['status'] == "for-rent"){
										$arr3[1] = "selected";
									}
									echo "<option value='for-sale' ".$arr3[0].">For Sale</option>";
									echo "<option value='for-rent' ".$arr3[1].">For Rent</option>";
								?>
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<label for="state"># of Bedrooms</label>
							<select class="custom-select d-block w-100" id="property-bedrooms" name="property-bedrooms" required>
								<option value="">Choose...</option>
								<?php
								$arr3 = array("","","","","","","","","","", "");
								
								$arr3[(int)$row['num_bedroom']] = "selected";
								    echo "<option value='0' ".$arr3[0].">0</option>";
									echo "<option value='1' ".$arr3[1].">1</option>";
									echo "<option value='2' ".$arr3[2].">2</option>";
									echo "<option value='3' ".$arr3[3].">3</option>";
									echo "<option value='4' ".$arr3[4].">4</option>";
									echo "<option value='5' ".$arr3[5].">5</option>";
									echo "<option value='6' ".$arr3[6].">6</option>";
									echo "<option value='7' ".$arr3[7].">7</option>";
									echo "<option value='8' ".$arr3[8].">8</option>";
									echo "<option value='9' ".$arr3[9].">9</option>";
									echo "<option value='10' ".$arr3[10].">10</option>";
								?>
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label for="address">Address Details</label>
						<input type="text" class="form-control" id="property-address" name="property-address" value="<?php echo $row['exact_loc']; ?>" placeholder="1234 Main St" required>
					</div>
					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="address">Floor Area (sqm)</label>
							<input type="number" class="form-control" id="property-area" name="property-area" value="<?php echo $row['area_span']; ?>"placeholder="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="address">Price (PHP)</label>
							<input type="number" class="form-control" id="property-price" name="property-price" value="<?php echo $row['price']; ?>"placeholder="" required>
							<div class="invalid-feedback">Please enter an address details.</div>
						</div>
					</div>
					<hr class="mb-4">
					<div class="mb-3">
						<label>Current Property Thumbnail:</label><br>
						<img src="<?php echo "images/uploads/".$row['directory_name']."/".$row['profile_image'];?>" width="200px">
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label>Change Thumbnail</label>
							<input type="file" class="form-control" id="property-thumbnail" name="property-thumbnail" placeholder="">
						</div>
						<div class="col-md-3 mb-3"><br>
							<input type="submit" class="btn btn-primary btn-md mt-2" placeholder="" id="change-property-thumbnail" name="change-property-thumbnail" required value="Change">
						</div>
					</div>
					<hr class="mb-4">
					<div class="row">
                    	<div class="col-md-3 mb-3">
							<label for="zip"></label>Gallery<br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label>Add Image to Gallery</label>
							<input type="file" class="form-control" id="property-gallery-image" name="property-gallery-image" placeholder="">
						</div>
						<div class="col-md-3 mb-3"><br>
							<input type="submit" class="btn btn-primary btn-md mt-2" placeholder="" id="add-image-property" name="add-image-property" required value="Add">
						</div>
					</div>
					<div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row">
									<?php 
										$arr4 = explode('/', $row['image_directories']);
										
										for($i = 1; $i < count($arr4); $i++){
											echo "<div class='col-md-4'><div class='card mb-4 box-shadow'><img class='card-img-top' style='max-height: 200px;' src='". "images/uploads/".$row['directory_name']."/".$arr4[$i]."' alt='Card image cap'>";
											echo "<div class='card-body'><div class='d-flex justify-content-between align-items-center'><div class='btn-group'>";
                                        	echo "<button type='button' class='btn btn-sm btn-outline-secondary'>View</button>";
                                        	echo "<button type='button' class='btn btn-sm btn-outline-secondary'>Delete</button>";
                                        	echo "</div></div></div></div></div>";
										}
									?>
                                </div>
                            </div>
                        </div>
					<hr class="mb-4">
					<h4 class="mb-3">Availability</h4>
					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="property-avail" name="property-avail" type="radio" class="custom-control-input" checked required>
							<label class="custom-control-label" for="property-avail">Available</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="property-not-avail" name="property-avail" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="property-not-avail">Not Available</label>
						</div>
					</div>
					<h4 class="mb-3">Visibility</h4>
					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="property-visible" name="property-visible" type="radio" class="custom-control-input" checked required>
							<label class="custom-control-label" for="property-visible">Visible</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="property-not-visible" name="property-visible" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="property-not-visible">Hidden</label>
						</div>
					</div>
					<hr class="mb-4">
					<div class="row">
						<div class="col-md-6 mb-3">
							<button class="btn btn-primary btn-lg btn-block" type="submit" name="apply_property">Apply</button>
						</div>
						<div class="col-md-6 mb-3">
							<button class="btn btn-primary btn-lg btn-block" type="button" onClick="window.location='admin_table.php'">Back</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include 'includes/checkEditPropertiesInput.php';?>
		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">&copy; 2017-2018 Affluent Properties</p>
		</footer>
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="assets/js/vendor/popper.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="assets/js/vendor/holder.min.js"></script>
    <script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
		})();
    </script>
  </body>
</html>
