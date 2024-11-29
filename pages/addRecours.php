<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recours</title>

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


$id_student = $_SESSION['id_student'];
?>

<div class="container mt-5">
    <h2>Add Recours</h2>

    <form action="../db/add_recours_process.php" method="post">
     
        <input type="hidden" name="id_student" value="<?php echo $id_student; ?>">
        <input type="hidden" name="status" value="3">

    
        <div class="form-group">
            <label for="module">Module:</label>
            <input type="text" class="form-control" name="module" required>
        </div>

        <div class="form-group">
            <label for="nature">Nature (cc or test):</label>
            <select class="form-control" name="nature" required>
                <option value="cc">CC</option>
                <option value="examen">examen</option>
            </select>
        </div>

        <div class="form-group">
            <label for="note_affiche">Note Affiche:</label>
            <input type="text" class="form-control" name="note_affiche" required>
        </div>

        <div class="form-group">
            <label for="note_reel">Note Reel:</label>
            <input type="text" class="form-control" name="note_reel" required>
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
