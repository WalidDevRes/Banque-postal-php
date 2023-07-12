<?php
//Transfert des "Variables HTML" --> Variables PHP
$email = $_POST['email'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';

//Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'BanquePostal');
if ($conn->connect_error) {
    die('Échec : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM register WHERE Email = ? AND MotDePasse = ?");
    $stmt->bind_param("ss", $email, $motdepasse);
    $stmt->execute();
    $result = $stmt->get_result();
}

if ($result->num_rows === 1) {
    header("Location: site.html");
} else {
    header("Location: error.html");
}

$stmt->close();
?>