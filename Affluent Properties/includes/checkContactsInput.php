<?php 
    if(isset($_POST['send'])){
        $name = $_POST['name'];;
        $email = $_POST['email'];
        $comments = $_POST['comments'];
        $sql = "INSERT INTO contacts (name, email, comment) VALUES ('$name', '$email', '$comments');";
        mysqli_query($conn, $sql);
                
        header("Location: index.php");
    }
?>