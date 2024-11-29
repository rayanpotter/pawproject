<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recours_id = isset($_POST['recours_id']) ? $_POST['recours_id'] : '';

   
    if (isset($_POST['favorable'])) {
        updateStatus($recours_id, 1);
    } elseif (isset($_POST['defavorable'])) {
        updateStatus($recours_id, 2); 
    }

   
    header("Location: tech_dashboard.php");
    exit();
}

function updateStatus($recours_id, $status)
{
    global $pdo;
    $sql = "UPDATE recours SET status = :status WHERE id = :recours_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':recours_id', $recours_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
