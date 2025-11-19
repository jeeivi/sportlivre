<?php
session_start();
include("db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    mysqli_query($conn, "UPDATE users SET username='$username', password='$password' WHERE id=$id");
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Editar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Editar Usuário</h2>
<form method="POST">
    <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
    <input type="text" name="password" value="<?php echo $row['password']; ?>" required><br>
    <button type="submit">Salvar</button>
</form>
<a href="home.php">Voltar</a>
</body>
</html>