<!DOCTYPE html>
<html lang="en">

<head>

	<?php 
		include 'includes/dbconnect.php';
		include 'includes/check-session.php';
		include 'includes/crud/get-all-products.php';
	?>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACF Pasalubong Store System | Inventory</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-table"></i> Inventory</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Product Price (PHP)</th>
											<th>Total Sales</th>
											<th>Product Visibility</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php
										for($i = 0; $i < count($GLOBALS['products']); $i++){
											echo "<tr>";
											echo "<td>" . $GLOBALS['products'][$i]['ProductName']. "</td>";
											echo "<td>" . $GLOBALS['products'][$i]['ProductCode']. "</td>";
											echo "<td>" . number_format($GLOBALS['products'][$i]['ProductPrice']) . "</td>";
											echo "<td>" . $GLOBALS['products'][$i]['TotalSales']. "</td>";
											$label = ($GLOBALS['products'][$i]['ProductHidden'] == 0) ? "Visible" : "Hidden";
											echo "<td>" . $label . "</td>";
											echo '<td>';
											echo '<a href="product-details.php?code=' . $GLOBALS['products'][$i]['ProductCode'] . '" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a> ';
											echo '<a href="edit-product-details.php?code=' . $GLOBALS['products'][$i]['ProductCode'] . '" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a> ';
											echo '<a href="includes/crud/delete-product.php?code=' . $GLOBALS['products'][$i]['ProductCode'] . '" class="btn btn-danger btn-circle" onClick="' . "return confirm('Are you sure you want to delete this product?')" .'"><i class="fas fa-trash-alt"></i></a>';
											echo '</td>';
											echo "</tr>";
										}
										?>
                  </tbody>
                </table>
              </div>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
	<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
