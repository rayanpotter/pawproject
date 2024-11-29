<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Recours</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
session_start();
include("../db/Database.php");

if (!isset($_SESSION['id_student'])) {
    header("Location: form.php"); 
    exit();
}


$recours_id = $_GET['id'];

$recours_sql = "SELECT * FROM recours WHERE id = :recours_id";
$recours_stmt = $pdo->prepare($recours_sql);
$recours_stmt->bindParam(':recours_id', $recours_id);
$recours_stmt->execute();

$recours = $recours_stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Modify Recours</h2>

    <form action="../db/modify_recours_process.php" method="post">
 
        <input type="hidden" name="recours_id" value="<?php echo $recours_id; ?>">

   
        <div class="form-group">
            <label for="module">Module:</label>
            <input type="text" class="form-control" name="module" value="<?php echo $recours['module']; ?>" required>
        </div>

        <div class="form-group">
            <label for="nature">Nature:</label>
            <select class="form-control" name="nature" required>
                <option value="cc" <?php echo ($recours['nature'] === 'cc') ? 'selected' : ''; ?>>CC</option>
                <option value="test" <?php echo ($recours['nature'] === 'test') ? 'selected' : ''; ?>>Test</option>
            </select>
        </div>

        <div class="form-group">
            <label for="note_affiche">Note Affiche:</label>
            <input type="text" class="form-control" name="note_affiche" value="<?php echo $recours['note_affiche']; ?>" required>
        </div>

        <div class="form-group">
            <label for="note_reel">Note Reel:</label>
            <input type="text" class="form-control" name="note_reel" value="<?php echo $recours['note_reel']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="../db/welcome.php" class="btn btn-secondary mt-3">Back to Welcome Page</a>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
