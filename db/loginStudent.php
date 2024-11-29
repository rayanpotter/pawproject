<?php
include 'Database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nom = $_POST["nom"];

    
    $sql = "SELECT id FROM students WHERE email = :email AND nom = :nom";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id_student'] = $user['id'];
        header("Location: welcome.php");
        exit();
    } else {
       
        header("Location: ../pages/form.php");
        exit();
    }
}
