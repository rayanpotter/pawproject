<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
session_start();
include("Database.php");


if (!isset($_SESSION['id_student'])) {
    header("Location: ../pages/form.php"); 
    exit();
}


$id_student = $_SESSION['id_student'];


$user_sql = "SELECT * FROM students WHERE id = :id_student";
$user_stmt = $pdo->prepare($user_sql);
$user_stmt->bindParam(':id_student', $id_student);
$user_stmt->execute();

$user = $user_stmt->fetch(PDO::FETCH_ASSOC);


$recours_sql = "SELECT * FROM recours WHERE id_student = :id_student"; 
$recours_stmt = $pdo->prepare($recours_sql);
$recours_stmt->bindParam(':id_student', $id_student);
$recours_stmt->execute();

$recours = $recours_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Welcome, <?php echo $user['nom']; ?>!</h2>
    <p>Email: <?php echo $user['email']; ?></p>

    <?php if (!empty($recours)): ?>
        <h3>Your Recours:</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Module</th>
                    <th>Nature</th>
                    <th>Note Affiche</th>
                    <th>Note Reel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recours as $recours_row): ?>
                    <tr>
                        <td><?php echo $recours_row['module']; ?></td>
                        <td><?php echo $recours_row['nature']; ?></td>
                        <td><?php echo $recours_row['note_affiche']; ?></td>
                        <td><?php echo $recours_row['note_reel']; ?></td>
                        <td>
                            <?php
                            $statusClass = '';
                            if ($recours_row['status'] == 1) {
                                echo "Favorable";
                                $statusClass = 'text-success';
                            } elseif ($recours_row['status'] == 2) {
                                echo "Defavorable";
                                $statusClass = 'text-danger';
                            } else {
                                echo "En Attente";
                                $statusClass = 'text-warning';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="../pages/modifRecours.php?id=<?php echo $recours_row['id']; ?>" class="btn btn-warning">Modify</a>
                            <a href="../pages/delete_recours.php?id=<?php echo $recours_row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No recours found.</p>
    <?php endif; ?>

    <a href="../pages/addRecours.php" class="btn btn-primary">Add Recours</a>
    <a href="logoutStudent.php" class="btn btn-danger">Logout</a>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
