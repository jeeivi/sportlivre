<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sportLivre";

// Conexão usando mysqli
$conn = mysqli_connect($host, $user, $pass, $db);

// Verifica conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
