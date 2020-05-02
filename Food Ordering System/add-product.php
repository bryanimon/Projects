<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACF Pasalubong Store System | Add Product</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'includes/html/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'includes/html/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
					
					<div class="card shadow mb-4">
						<div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa fa-plus"></i> Add Product</h3>
                </div>
                <div class="card-body">
                  Please fill in the information below. The field labels marked with * are required input fields.
									<hr>
									<form method="post" action="includes/crud/add-product-to-db.php">
										<div class="row">
											<div class="col-lg-6">
												<p><b>Product Name: *</b></p>
												<input type="text" class="form-control form-control-user" placeholder="Product Name" name="product-name" required>
												<br>
												<p><b>Product Code: (Min. 5 characters) *</b></p>
												<input type="text" class="form-control form-control-user" placeholder="Product Code" id="product-code" name="product-code" required>
												<br>
												<button class="form-control form-control-user btn btn-info" type="button" id="random-code"><i class="fas fa-fw fa fa-random"></i> Generate Random Code</button>
												<br>
												<br>
												<p><b>Product Price (PHP): *</b></p>
												<input type="number" min="0" max="1000000" class="form-control form-control-user" placeholder="Product Price" name="product-price" required>
												<br>
												<p><b>Product Description: </b></p>
												<textarea class="form-control form-control-user" placeholder="Product Description" rows="5" name="product-desc"></textarea>
												<br>
												<p><b>Product Visibility: </b></p>
												<input type="radio" name="visibility" value="0" id="visible" required checked="checked"> <label for="visible">Visible</label><br>
  											<input type="radio" name="visibility" value="1" id="hidden" required> <label for="hidden">Hidden</label><br>
												<hr>
												<input class="form-control form-control-user btn btn-success" type="submit" value="Add Product" id="add-product" disabled>
											</div>
										</div>
									</form>
                </div>
              </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'includes/html/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
	<?php include 'includes/html/logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

	<script type="text/javascript">
		// Product Code Length
    $('#product-code').on('input',function(e){
			checkProductCodeLength();
		});
		
		// Generate Random Code
		$("#random-code").click(function(e) {
				$.ajax({
					type: "POST",
					url: 'includes/generate-code.php',
					data: ({}),
					dataType: 'json',
					success: function(data) {
						let html = "";
						var code = data.toUpperCase();
						$('#product-code').val(code);
						checkExistingCode(code);
					},
					error: function(ts) {
						alert(ts.responseText);
					}  
				});
			}
		);
		
		// Check product text length
		function checkProductCodeLength(){
			var text = $('#product-code').val();
			
			if(text.length >= 5){
				checkExistingCode(text);
			}else{
				toggleAddProductButton(false);
			}
		}
		
		//Check if code exists
		function checkExistingCode(text){
			$.ajax({
					type: "POST",
					url: 'includes/check-existing-code.php',
					data: ({code:text}),
					dataType: 'json',
					success: function(data) {
						let html = "";
						if(data != "NONE"){
              var count = parseInt(data);
							
							if(count <= 0){
								toggleAddProductButton(true);
							}else{
								toggleAddProductButton(false);
							}
						}
					},
					error: function(ts) {
            alert(ts.responseText);
    			}  
				});
		}
		
		// Toggle add product button
		function toggleAddProductButton(flag){
			if(flag){
				$('#product-code').removeClass("border-bottom-danger");
				$('#product-code').addClass("border-bottom-success");
				$('#add-product').removeAttr("disabled");
			}else{
				$('#product-code').removeClass("border-bottom-success");
				$('#product-code').addClass("border-bottom-danger");
				$('#add-product').prop("disabled", true);
			}
		}
		
  </script>
	
</body>

</html>
