<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid_email = "admin@gmail.com";
    $valid_password = "admin";

 
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    
    if ($email == $valid_email && $password == $valid_password) {
       
        header("Location: ../db/tech_dashboard.php");
        exit();
    } else {
        $error_message = "Invalid email or password. Please try again.";
        include("../pages/tech.php"); 
        exit();
    }
}
?>


<?php include("../pages/tech.php"); ?>
