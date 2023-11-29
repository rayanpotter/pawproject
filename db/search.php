<?php
// Include the database connection
include 'Database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the user input from the form
  $email = $_POST["email"];
  $prenom = $_POST["prenom"];
  $nom = $_POST["nom"];

  // Prepare the base SQL query
  $sql = "SELECT * FROM students WHERE 1";

  // Build the query based on the provided input
  if (!empty($nom)) {
    $sql .= " AND nom = :nom";
  }

  if (!empty($email)) {
    $sql .= " AND email = :email";
  }

  if (!empty($prenom)) {
    $sql .= " AND prenom = :prenom";
  }

  // Prepare and execute the SQL query
  $stmt = $pdo->prepare($sql);

  if (!empty($nom)) {
    $stmt->bindParam(':nom', $nom);
  }

  if (!empty($email)) {
    $stmt->bindParam(':email', $email);
  }

  if (!empty($prenom)) {
    $stmt->bindParam(':prenom', $prenom);
  }

  $stmt->execute();

  // Fetch the results
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Search Results</title>
</head>

<body>
  <h2>User Search Results</h2>

  <?php
  // Display results if available
  if (isset($results) && count($results) > 0) {
    echo "<h3>Search Results:</h3>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>prenom</th><th>Email</th><th>groupe</th></tr>";

    foreach ($results as $row) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['nom'] . "</td>";
      echo "<td>" . $row['prenom'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['groupe'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "<p>No results found.</p>";
  }
  ?>

</body>

</html>