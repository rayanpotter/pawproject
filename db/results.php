<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include("Database.php");


$results_sql = "SELECT recours.id as recours_id, students.id as student_id, students.nom, students.prenom, students.email, students.groupe,
                recours.module, recours.nature, recours.note_affiche, recours.note_reel, recours.status
                FROM recours
                INNER JOIN students ON recours.id_student = students.id";
$results_stmt = $pdo->prepare($results_sql);
$results_stmt->execute();
$results = $results_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Results</h2>

    <?php if (!empty($results)): ?>
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?php echo $result['student_id']; ?></td>
                        <td><?php echo $result['nom'] . ' ' . $result['prenom']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['groupe']; ?></td>
                        <td><?php echo $result['module']; ?></td>
                        <td><?php echo $result['nature']; ?></td>
                        <td><?php echo $result['note_affiche']; ?></td>
                        <td><?php echo $result['note_reel']; ?></td>
                        <td style="color: <?php echo getStatusColor($result['status']); ?>">
                            <?php echo getStatusText($result['status']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

    <a href="../index.php" class="btn btn-secondary">Back to Home</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
function getStatusColor($status)
{
    switch ($status) {
        case 1:
            return '#89B9AD'; // Favorable
        case 2:
            return '#860A35'; // Defavorable
        default:
            return '#F3B664'; // En attent
    }
}

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
