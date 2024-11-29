<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id_student = $_POST["id_student"];
    $status = $_POST["status"];
    $module = $_POST["module"];
    $nature = $_POST["nature"];
    $note_affiche = $_POST["note_affiche"];
    $note_reel = $_POST["note_reel"];

  
    $insert_sql = "INSERT INTO recours (id_student, status, module, nature, note_affiche, note_reel) 
                   VALUES (:id_student, :status, :module, :nature, :note_affiche, :note_reel)";
    $insert_stmt = $pdo->prepare($insert_sql);
    $insert_stmt->bindParam(':id_student', $id_student);
    $insert_stmt->bindParam(':status', $status);
    $insert_stmt->bindParam(':module', $module);
    $insert_stmt->bindParam(':nature', $nature);
    $insert_stmt->bindParam(':note_affiche', $note_affiche);
    $insert_stmt->bindParam(':note_reel', $note_reel);
    $insert_stmt->execute();

   
    header("Location: welcome.php");
    exit();
}
?>
