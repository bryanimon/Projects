<!DOCTYPE html>
<html lang="en">

<head>

	<?php 
		include 'includes/dbconnect.php';
		include 'includes/check-session.php';
		include 'includes/crud/get-order-by-code.php';
	
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
		
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="height:100vh;">
				
        <!-- Begin Page Content -->
        <div class="container-fluid" style="color: black;">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="card shadow mb-4" style="margin-top: 20vh;">
								<div class="card-header py-3">
									<h3 class="m-0 font-weight-bold"><i class="fas fa-fw fa-truck"></i> Order #<?php echo $GLOBALS['order-details']['DeliveryCode']; ?></h3>
									<hr>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-5" style="border-right: 1px solid lightgray;">
												<br>
												<table class="table" style="color:black;">
													<tbody>
														<tr>
															<td><b>Customer Name:</b></td>
															<td><?php echo $GLOBALS['order-details']['CustomerName']; ?></td>
														</tr>
														<tr>
															<td><b>Delivery Address:</b></td>
															<td><?php echo $GLOBALS['order-details']['Address']; ?></td>
														</tr>
														<tr>
															<td><b>Date Ordered:</b></td>
															<td><?php echo date("F j, Y | h:i A", strtotime($GLOBALS['order-details']['DateOrdered'])); ?></td>
														</tr>
														<tr>
															<td><b>Payment Method:</b></td>
															<td><?php echo $GLOBALS['order-details']['PaymentMethod']; ?></td>
														</tr>
														<tr>
															<td><b>Delivery Method:</b></td>
															<td><?php echo $GLOBALS['order-details']['DeliveryMethod']; ?></td>
														</tr>
														<tr>
															<td><b>Cart Total:</b></td>
															<td>PHP <?php echo $GLOBALS['order-details']['Total']; ?></td>
														</tr>
														<tr>
															<td><b>Status:</b></td>
															<td><?php echo $GLOBALS['order-details']['Status']; ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-sm-1">
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-3"><b>Product Name</b></div>
													<div class="col-lg-3"><b>Unit Price</b></div>
													<div class="col-lg-3"><b>Quantity</b></div>
													<div class="col-lg-3"><b>Total Price</b></div>
												</div>
												<hr>
												<?php
												if(isset($GLOBALS['order-details'])){
														echo '<div class="row">';
														echo htmlspecialchars_decode($GLOBALS['order-details']['OrderList']);
														echo '</div>';
												}

												?>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-23"></div>
					</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
