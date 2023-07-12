<?php
//Transfert des "Variables HTML" --> Variables PHP
$prenom = $_POST['prenom'] ?? '';
$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$numero = $_POST['numero'] ?? '';
$date = $_POST['date'] ?? '';
$genre = $_POST['genre'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';

//Connexion à la base de données
$conn = new mysqli('localhost','root','','BanquePostal');
if ($conn->connect_error){
    die('Échec : ' .$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO register(Prenom, Nom, Email, NumeroTel, DateNaissance, Genre, MotDePasse)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $prenom, $nom, $email, $numero, $date, $genre, $motdepasse);
    $stmt->execute();
    header("Location: connection.html");
    $stmt->close();
    $conn->close();
}

$stmt = $pdo->prepare("SELECT * FROM register WHERE Email = ?");
$stmt->execute([$email]);
$register = $stmt->fetch();

if ($register !== false) {
    echo 'existe';
} else {
    echo 'pas';
}

?>