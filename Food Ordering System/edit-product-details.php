<!DOCTYPE html>
<html lang="en">

<head>

	<?php 
		include 'includes/dbconnect.php';
		include 'includes/check-session.php';
		include 'includes/crud/get-product-by-code.php';
	?>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACF Pasalubong Store System | Delivery</title>

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
							<h3 class="m-0 font-weight-bold text-primary">Product Details</h3>
						</div>
						<div class="card-body">
							<form method="post" action="includes/crud/update-product-to-db.php" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<p><b>Product Name:</b></p>
										<input type="text" class="form-control form-control-user" placeholder="Product Name" name="product-name" value="<?php echo $GLOBALS['product']['ProductName']; ?>" required>
										<br>
										<p><b>Product Price (PHP): </b></p>
										<input type="number" min="0" max="1000000" class="form-control form-control-user" placeholder="Product Price" name="product-price" value="<?php echo $GLOBALS['product']['ProductPrice']; ?>" required>
										<br>
										<p><b>Product Description: </b></p>
										<textarea class="form-control form-control-user" placeholder="Product Description" rows="5" name="product-desc"><?php echo $GLOBALS['product']['ProductDescription']; ?></textarea>
										<br>
										<p><b>Product Visibility: </b></p>
										<?php 
										$visibleRadioLabel = ($GLOBALS['product']['ProductHidden'] == 0) ? 'checked="checked"' : '';
										$hiddenRadioLabel = ($GLOBALS['product']['ProductHidden'] == 0) ? '' : 'checked="checked"'; 
										?>
										<input type="radio" name="visibility" value="0" id="visible" <?php echo $visibleRadioLabel; ?> required> <label for="visible" required>Visible</label><br>
  									<input type="radio" name="visibility" value="1" id="hidden" <?php echo $hiddenRadioLabel; ?>  required> <label for="hidden" required>Hidden</label><hr>
										<p><b>Add images: </b></p>
										<input type="hidden" value="<?php echo $GLOBALS['product']['ProductID']; ?>" name="product-id">
										<input type="file" class="form-control" style="padding-bottom: 35px;" name="program_images[]" multiple>
									</div>
									<div class="col-lg-6">
										<p><b>Gallery: </b></p>
										<hr>
										<div class="row">
											<?php
												$count = substr_count($GLOBALS['product']['ProductImages'], "/");
												
												if($count > 0){
													$images = explode("/", $GLOBALS['product']['ProductImages']);
													
													for($i = 0; $i < count($images) - 1; $i++){
														$isThumbnail = false;
														$label = "";
														
														if($images[$i] == $GLOBALS['product']['ProductThumbnail']){
															$label = "border-left-primary";
															$isThumbnail = true;
														}
														
														echo '<div class="col-xl-6 col-md-6 mb-4">';
														echo '<div class="card ' . $label . ' shadow h-100 py-2">';
														echo '<div class="card-body">';
														echo '<div class="row no-gutters align-items-center">';
														echo '<div class="col mr-2">';
														echo '<center><img src="img/' . $images[$i] . '" onerror=this.src="img/no-image-available.png" style="max-height: 20vh; max-width: 20vw;"></center>';
														echo '<hr>';
														echo '<center>';
														
														if(!$isThumbnail){
															echo '<a class="btn btn-sm btn-info" href="includes/crud/set-thumbnail.php?image=' . $images[$i] . '&id=' . $GLOBALS['product']['ProductID'] .'&code=' . $GLOBALS['product']['ProductCode'] .'"><i class="fas fa-check"></i> Set as Thumbnail</a> ';
														}
														
														echo '<a class="btn btn-sm btn-danger" href="includes/crud/delete-image.php?image=' . $images[$i] . '&id=' . $GLOBALS['product']['ProductID'] .'&code=' . $GLOBALS['product']['ProductCode'] .'" onClick="' . "return confirm('Are you sure you want to delete this image?')" . '"><i class="fas fa-trash"></i> Delete</a>';
														echo '</center>';
														echo '</div>';
														echo '</div>';
														echo '</div>';
														echo '</div>';
														echo '</div>';
													}
												}
											?>
										</div>
									</div>
								</div>
								<hr>
								<input class="form-control form-control-user btn btn-success" type="submit" value="Update Product Details" id="add-product">
							</form>
						</div>
					</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Topbar -->
      <?php include 'includes/html/footer.php'; ?>
      <!-- End of Topbar -->

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

</body>

</html>
