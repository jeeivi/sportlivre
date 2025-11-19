<?php
session_start();
include("db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    mysqli_query($conn, "UPDATE products SET name='$name', price='$price' WHERE id=$id");
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
<main class="container">
        <div class="box">
        <h1 style="text-align: center;">Novo Produto</h1>
        <form method="post">
        <div class="nome">
            <input type="text" placeholder="Nome" required>
        </div>
        <div class="produto">
            <input type="text" placeholder="Produto" required>
        </div>
        <div class="preco">
            <input type="text" placeholder="Preço" required>
        </div>
        <div class="estoque">
            <input type="text" placeholder="Estoque" required>
        </div>
        <div class="cancelar" style="display: inline-block;"> 
            <a href="/Login/principal.html">X CANCELAR</a>
        </div>
        <div class="confirmar" style="display: inline-block;">
            <input type="submit" value="CONFIRMAR">
        </div>
        </form>
        </div>
    </main>

<h2>Editar Produto</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required><br>
    <button type="submit">Salvar</button>
</form>
<a href="home.php">Voltar</a>
</body>
</html>