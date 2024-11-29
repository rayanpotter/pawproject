<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $recours_id = $_POST["recours_id"];
    $module = $_POST["module"];
    $nature = $_POST["nature"];
    $note_affiche = $_POST["note_affiche"];
    $note_reel = $_POST["note_reel"];


    $update_sql = "UPDATE recours SET module = :module, nature = :nature, 
                   note_affiche = :note_affiche, note_reel = :note_reel 
                   WHERE id = :recours_id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->bindParam(':module', $module);
    $update_stmt->bindParam(':nature', $nature);
    $update_stmt->bindParam(':note_affiche', $note_affiche);
    $update_stmt->bindParam(':note_reel', $note_reel);
    $update_stmt->bindParam(':recours_id', $recours_id);
    $update_stmt->execute();


    header("Location: welcome.php");
    exit();
}
?>
