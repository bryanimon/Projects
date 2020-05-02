<?php

if(isset($_POST['new']) && isset($_POST['old'])){
	
	if(password_verify($_POST['new'], $_POST['old'])){
		echo "true";
	}else{
		echo "false";
	}
}else{
	echo "NONE";
}

?>