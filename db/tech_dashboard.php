<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Dashboard</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include("Database.php");


$sql = "SELECT students.*, recours.id AS recours_id, recours.module, recours.nature, recours.note_affiche, recours.note_reel, recours.status
        FROM students
        LEFT JOIN recours ON students.id = recours.id_student
        WHERE recours.status IS NOT NULL
        AND recours.status NOT IN (1, 2)";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Tech Dashboard</h2>

    <?php if (!empty($students)): ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th>Module</th>
                    <th>Nature</th>
                    <th>Note Affiche</th>
                    <th>Note Reel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['nom'] . ' ' . $student['prenom']; ?></td>
                        <td><?php echo $student['email']; ?></td>
                        <td><?php echo $student['groupe']; ?></td>
                        <td><?php echo $student['module']; ?></td>
                        <td><?php echo $student['nature']; ?></td>
                        <td><?php echo $student['note_affiche']; ?></td>
                        <td><?php echo $student['note_reel']; ?></td>
                        <td><?php echo getStatusText($student['status']); ?></td>
                        <td>
                            <form method="post" action="update_status.php">
                                <input type="hidden" name="recours_id" value="<?php echo $student['recours_id']; ?>">
                                <button type="submit" name="favorable" class="btn btn-success">Favorable</button>
                                <button type="submit" name="defavorable" class="btn btn-danger">Defavorable</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No students with recours found.</p>
    <?php endif; ?>

    <a href="../index.php" class="btn btn-secondary">Back to Home</a>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
function getStatusText($status)
{
    switch ($status) {
        case 1:
            return 'Favorable';
        case 2:
            return 'Defavorable';
        default:
            return 'En attent';
    }
}
?>
