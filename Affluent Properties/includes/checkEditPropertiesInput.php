<?php
	if(isset($_POST['change-property-thumbnail'])){
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

		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 2097152){
					$fileNameNew = "thumbnail.".$fileActualExt;
					$fileTarget = 'images/uploads/'.$row['directory_name']."/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileTarget);
					$sql = "UPDATE properties SET profile_image='thumbnail.".$fileActualExt."' WHERE id='".$id."'";
					$result = mysqli_query($conn, $sql);
					header("Location: editProperty.php?id=".$id);
				}
			}
		}
	}else if(isset($_POST['add-image-property'])){
		/*property_image*/
		$file = $_FILES['property-gallery-image'];
		$fileName = $_FILES['property-gallery-image']['name'];
		$fileTmpName = $_FILES['property-gallery-image']['tmp_name'];
		$fileSize = $_FILES['property-gallery-image']['size'];
		$fileError = $_FILES['property-gallery-image']['error'];
		$fileType = $_FILES['property-gallery-image']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');
		$fileNameNew = "";

		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 2097152){
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileTarget = 'images/uploads/'.$row['directory_name']."/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileTarget);
					$new_image_directories = $row['image_directories']."/".$fileNameNew;
					$sql = "UPDATE properties SET image_directories='".$new_image_directories."' WHERE id='".$id."'";
					$result = mysqli_query($conn, $sql);
					header("Location: editProperty.php?id=".$id);
				}
			}
		}
	}else if(isset($_POST['apply_property'])){
		$sql = "UPDATE properties SET property_name='".$_POST['property-name']."', 
		category='".$_POST['property-category']."',
		location='".$_POST['property-location']."',
		status='".$_POST['property-status']."',
		num_bedroom='".$_POST['property-bedrooms']."',
		exact_loc='".$_POST['property-address']."',
		area_span='".$_POST['property-area']."',
		price = '".$_POST['property-price']."'

		WHERE id='".$id."'";
		$result = mysqli_query($conn, $sql);
		
		header("Location: admin_table.php");
		
	}
?>