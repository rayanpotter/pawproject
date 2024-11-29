<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_student"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $groupe = $_POST["groupe"];

        $sql = "INSERT INTO students (nom, prenom, email, groupe) VALUES (:nom, :prenom, :email, :groupe)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':groupe', $groupe);
        $stmt->execute();

        $id_student = $pdo->lastInsertId();
        session_start();
        $_SESSION['id_student'] = $id_student;

        header("Location: welcome.php");
        exit();
    }
}
?>
