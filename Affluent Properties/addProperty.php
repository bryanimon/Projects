<!DOCTYPE html>
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
		<title>Affluent Propert | Admin | Add Property</title>
		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/form-validation.css" rel="stylesheet">
	</head>
	<body class="bg-light">
		
		<div class="container">
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="http://www.affluentproperties.ph/wp-content/uploads/2016/07/Affluent-Logo-Transparent-200.png" alt="" width="200px">
				<h2>Add Property Form</h2>
			</div>
			<div>
				<h4 class="mb-3">Property Details</h4>
				<form class="needs-validation"  method="POST" enctype="multipart/form-data" action="addProperty.php">
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="property">Property Name</label>
							<input type="text" class="form-control" id="property-name" name="property-name" placeholder="" required>
							<div class="invalid-feedback">Please enter a property name.</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="country">Category</label>
							<select class="custom-select d-block w-100" id="property-category" name="property-category" required>
								<option value="">Choose...</option>
								<option value="house-and-lot">House and Lot</option>
								<option value="lot-only">Lot Only</option>
							</select>
							<div class="invalid-feedback">Please select a valid category.</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="state">Location</label>
							<select class="custom-select d-block w-100" id="property-location" name="property-location" required>
								<option value="">Choose...</option>
								<option value="loc-makati">Makati</option>
								<option value="loc-taguig">Taguig</option>
								<option value="loc-pasig">Pasig</option>
								<option value="loc-quezon-city">Quezon City</option>
								<option value="loc-alabang">Alabang</option>
							</select>
							<div class="invalid-feedback">Please provide a valid location.</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="state">Status</label>
							<select class="custom-select d-block w-100" id="property-status" name="property-status" required>
								<option value="">Choose...</option>
								<option value="for-sale">For Sale</option>
								<option value="for-rent">For Rent</option>
							</select>
							<div class="invalid-feedback">Please provide a valid status.</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="state"># of Bedrooms</label>
							<select class="custom-select d-block w-100" id="property-bedrooms" name="property-bedrooms" required>
								<option value="">Choose...</option>
                                <option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<div class="invalid-feedback">Please provide a valid number of bedrooms.</div>
						</div>
					</div>
					
					<div class="mb-3">
						<label for="address">Address Details</label>
						<input type="text" class="form-control" id="property-address" name="property-address" placeholder="1234 Main St" required>
						<div class="invalid-feedback">Please enter an address details.</div>
					</div>
					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="address">Floor Area (sqm)</label>
							<input type="number" class="form-control" id="property-area" name="property-area" placeholder="" required>
							<div class="invalid-feedback">Please enter a valid floor area.</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="address">Price (PHP)</label>
							<input type="number" class="form-control" id="property-price" name="property-price" placeholder="" required>
							<div class="invalid-feedback">Please enter an address details.</div>
						</div>
					</div>
					<hr class="mb-4">
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="country">Upload Thumbnail</label>
							<input type="file" class="form-control" id="property-thumbnail" name="property-thumbnail" placeholder="" required>
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
							<button class="btn btn-primary btn-lg btn-block" type="submit" name="add_property">Add</button>
						</div>
						<div class="col-md-6 mb-3">
							<button class="btn btn-primary btn-lg btn-block" type="button" onClick="window.location='admin_table.php'">Back</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include 'includes/checkAddPropertiesInput.php';?>
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
