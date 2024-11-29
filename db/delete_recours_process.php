<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recours_id"])) {
    $recours_id = $_POST["recours_id"];
    $delete_sql = "DELETE FROM recours WHERE id = :recours_id";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->bindParam(':recours_id', $recours_id);
    $delete_stmt->execute();


    header("Location: welcome.php");
    exit();
} else {
    die("Invalid request.");
}
?>
