<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include("Database.php");

$email = isset($_POST['email']) ? $_POST['email'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';


$search_sql = "SELECT students.*, recours.module, recours.nature, recours.note_affiche, recours.note_reel, recours.status
               FROM students
               LEFT JOIN recours ON students.id = recours.id_student
               WHERE (students.email LIKE :email OR :email = '')
               AND (students.prenom LIKE :prenom OR :prenom = '')
               AND (students.nom LIKE :nom OR :nom = '')";
$search_stmt = $pdo->prepare($search_sql);
$search_stmt->bindValue(':email', '%' . $email . '%');
$search_stmt->bindValue(':prenom', '%' . $prenom . '%');
$search_stmt->bindValue(':nom', '%' . $nom . '%');
$search_stmt->execute();
$students = $search_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Search Results</h2>

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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['nom'] . ' ' . $student['prenom']; ?></td>
                        <td><?php echo $student['email']; ?></td>
                        <td><?php echo $student['groupe']; ?></td>
                        <td><?php echo $student['module'] ?? 'None'; ?></td>
                        <td><?php echo $student['nature'] ?? 'None'; ?></td>
                        <td><?php echo $student['note_affiche'] ?? 'None'; ?></td>
                        <td><?php echo $student['note_reel'] ?? 'None'; ?></td>
                        <td style="color: <?php echo getStatusColor($result['status']); ?>">
                            <?php echo $student['status'] !== null ? getStatusText($student['status']) : 'None'; ?>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found for the search query.</p>
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
