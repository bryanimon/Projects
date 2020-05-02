<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Properties</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" onClick="window.location='addProperty.php'">Add New Property</button>
                <button class="btn btn-sm btn-outline-secondary">Export as Excel spreadsheet</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Availability</th>
                    <th># of Bedrooms</th>
					<th>Price</th>
                    <th></th>
					<th></th>
                </tr>
            </thead>
            <tbody>
				<?php
					$sql = "SELECT * FROM properties";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>".$row['id']."</td>";
						echo "<td style='width: 220px;'>".$row['property_name']."</td>";
						echo "<td>".$row['category']."</td>";
						echo "<td>".$row['status']."</td>";
						echo "<td>".$row['location']."</td>";
						echo "<td></td>";
						echo "<td style='width: 50px;'>".$row['num_bedroom']."</td>";
						echo "<td>"."P ".$row['price']."</td>";
						echo "<td><button class='btn btn-warning btn-sm' id='".$row['id']."'>Edit</button>";
  						echo "<script>
							var btn = document.getElementById('".$row['id']."');
    						btn.addEventListener('click', function() {
								document.location.href = 'editProperty.php?id=".$row['id']."';
    						});";
  						echo "</script></td>";
						echo "<td><button class='btn btn-danger btn-sm' id='delete-".$row['id']."'>Delete</button>";
  						echo "<script>
							var btn = document.getElementById('delete-".$row['id']."');
    						btn.addEventListener('click', function() {
								document.location.href = 'deleteProperty.php?id=".$row['id']."';
    						});";
  						echo "</script></td>";
                    	echo "</td>";
						echo "</tr>";
					}
					?>
            </tbody>
        </table>
    </div>
	<script>
		var btn = document.getElementById('myBtn');
		btn.addEventListener('click', function() {
  			document.location.href = 'some/page';
		});
	</script>
</main>