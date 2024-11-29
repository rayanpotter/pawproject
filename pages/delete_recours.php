<?php
include("../db/Database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
   
    $recours_id = $_GET["id"];

    
    $recours_sql = "SELECT * FROM recours WHERE id = :recours_id";
    $recours_stmt = $pdo->prepare($recours_sql);
    $recours_stmt->bindParam(':recours_id', $recours_id);
    $recours_stmt->execute();

    $recours = $recours_stmt->fetch(PDO::FETCH_ASSOC);

    if (!$recours) {
        die("Recours not found.");
    }

    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Recours</title>
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container mt-5">
        <h2>Delete Recours</h2>
        <p>Are you sure you want to delete the recours with the following details?</p>

        <ul>
            <li><strong>Module:</strong> <?php echo $recours['module']; ?></li>
            <li><strong>Nature:</strong> <?php echo $recours['nature']; ?></li>
            <li><strong>Note Affiche:</strong> <?php echo $recours['note_affiche']; ?></li>
            <li><strong>Note Reel:</strong> <?php echo $recours['note_reel']; ?></li>
         
        </ul>

        <form action="../db/delete_recours_process.php" method="post">
            <input type="hidden" name="recours_id" value="<?php echo $recours_id; ?>">
            <button type="submit" class="btn btn-danger">Confirm Delete</button>
            <a href="../db/welcome.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    </html>
    <?php
} else {
    die("Invalid request.");
}
?>
