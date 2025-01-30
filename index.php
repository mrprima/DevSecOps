<?php
// Exemple de code PHP vulnérable
// Connexion à la base de données sans gestion d'exception
$host = 'localhost';
$dbname = 'testdb';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// Réception des données de l'utilisateur sans validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];
// Injection SQL possible
$query = "SELECT * FROM users WHERE username = '$username' AND
password = '$password'";
$stmt = $conn->query($query);
if ($stmt->rowCount() > 0) {
echo "Bienvenue, $username!";
} else {
echo "Nom d'utilisateur ou mot de passe incorrect.";
}
}

// Affichage direct des données utilisateur sans encodage
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
foreach ($conn->query($query) as $row) {
echo "Nom : " . $row['name'] . "<br>";
echo "Email : " . $row['email'] . "<br>";
}
}
?>
