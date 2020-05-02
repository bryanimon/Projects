<!DOCTYPE html>
<?php
	include 'includes/dbconnect.php';
    session_start();
?>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       <link href="css/dashboard.css" rel="stylesheet">
    <title>Admin</title>
      
    <style>
		t
    </style>
  </head>
    
  <body>
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Affluent Properties</a>
      </nav>
      
      <div class="container-fluid">
          <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                      <ul class="nav flex-column">
                          <li class="nav-item">
                              <form id="section_a" action="admin_table.php" method="POST">
                                  <input type="hidden" name="table-type" value="properties" />
                                  <a class="nav-link" onclick="document.getElementById('section_a').submit()" href="#"><span data-feather="home"></span>Properties</a>
                              </form>
                              
                          </li>
                          <li class="nav-item">
                              <form id="section_b" action="admin_table.php" method="POST">
                                  <input type="hidden" name="table-type" value="contact" />
                                  <a href="#" onclick="document.getElementById('section_b').submit()" class="nav-link" name="sadas">Contacts</a>
                              </form>
                          </li>
                      </ul>
                  </div>
              </nav>
              
              <?php
                if(isset($_POST['table-type'])){
                    if($_POST['table-type'] === "properties"){
                        include('showPropertiesTable.php');
                    }else if($_POST['table-type'] === "contact"){
                        include('showContactsTable.php');
                    }
                }else{
                    include('showPropertiesTable.php');
                }
              ?>
		  </div>
	  </div>
	</body>
</html>