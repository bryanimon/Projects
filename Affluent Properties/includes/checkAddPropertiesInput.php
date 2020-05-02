<?php
	if(isset($_POST['add_property'])){
		/*property_image*/
		$file = $_FILES['property-thumbnail'];
		$fileName = $_FILES['property-thumbnail']['name'];
		$fileTmpName = $_FILES['property-thumbnail']['tmp_name'];
		$fileSize = $_FILES['property-thumbnail']['size'];
		$fileError = $_FILES['property-thumbnail']['error'];
		$fileType = $_FILES['property-thumbnail']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');

		$fileNameNew = "";
		mkdir("images/uploads/".$_POST['property-name'], 0777, true);
		
		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 20971520){
					$fileNameNew = "thumbnail.".$fileActualExt;
					$fileTarget = 'images/uploads/'.$_POST['property-name']."/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileTarget);
				}
			}
		}
		
		$sql = "INSERT INTO properties (property_name, category, location, status, num_bedroom, exact_loc, area_span, price, profile_image, directory_name) 
		VALUES ('".$_POST['property-name']."','"
			.$_POST['property-category']."','"
			.$_POST['property-location']."','"
			.$_POST['property-status']."','"
			.$_POST['property-bedrooms']."','"
			.$_POST['property-address']."','"
			.$_POST['property-area']."','"
			.$_POST['property-price']."','"
			.$fileNameNew."','"
			.$_POST['property-name']
			."')";
		$result = mysqli_query($conn, $sql);
		header("Location: admin_table.php");
	}
?>