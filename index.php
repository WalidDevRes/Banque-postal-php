<?php
//Transfere des "Variable html" --> Variable php
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$date = $_POST['date'];
$genre = $_POST['genre'];

//Connection a la base de donnée
$conn = new mysqli('localhost','root','','BanquePostal');
if ($conn->connect_error){
    die('Fail : ' .$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO register(Prenom, Nom, Email, NumeroTel, DateNaissance, Genre)
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $prenom, $nom, $email, $numero, $date, $genre);
    $stmt->execute(); // Corrected method name
    echo "Inscription faite !!";
    $stmt->close();
    $conn->close();
}
?>
