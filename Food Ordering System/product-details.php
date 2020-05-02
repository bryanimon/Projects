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
					
					<div style="display: flex; justify-content: flex-end; color: white;">
						<a class="btn btn-info" href="tables.php"><i class="fas fa-arrow-left"></i> Back to Products Table</a>
					</div>
					
					<br>
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h3 class="m-0 font-weight-bold text-primary">Product Details</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<center><img src="img/<?php echo $GLOBALS['product']['ProductThumbnail']; ?>" onerror=this.src="img/no-image-available.png" style="max-height:40vh; max-width:40vw;"></center>
								</div>
								<div class="col-lg-6">
									<table class="table table-striped" style="color:black;">
										<tbody>
											<col width="40%" >
											<tr>
												<td align="right"><b>Name</b></td>
												<td><?php echo $GLOBALS['product']['ProductName']; ?></td>
											</tr>
											<tr>
												<td align="right"><b>Code</b></td>
												<td><?php echo $GLOBALS['product']['ProductCode']; ?></td>
											</tr>
											<tr>
												<td align="right"><b>Price</b></td>
												<td>PHP <?php echo number_format($GLOBALS['product']['ProductPrice']); ?></td>
											</tr>
											<tr>
												<td align="right"><b>Total Sales</b></td>
												<td><?php echo $GLOBALS['product']['TotalSales']; ?></td>
											</tr>
											<tr>
												<td align="right"><b>Product Visible?</b></td>
												<td><?php echo ($GLOBALS['product']['ProductHidden'] == 0) ? "Visible" : "Hidden"; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<hr>
							<table class="table table-striped">
								<tbody>
									<tr>
										<td>Product Description:</td>
									</tr>
									<tr>
										<td><?php echo $GLOBALS['product']['ProductDescription']; ?></td>
									</tr>
								</tbody>
							</table>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
