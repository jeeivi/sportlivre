<?php
session_start();
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    mysqli_query($conn, "INSERT INTO products(name, price, stock) VALUES('$name', '$price', '$stock')");
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Adicionar</title>
<link rel="stylesheet" href="cads.css">
</head>
<body>
    <main class="container">
        <div class="box">
        <h1 style="text-align: center;">Novo Produto</h1>
        <form method="post">
        <div class="nome">
            <input type="text" name="name" placeholder="Nome" required>
        </div>
        <div class="preco">
            <input type="number" step="0.01" name="price" placeholder="Preço" required>
        </div>
        <div class="estoque">
            <input type="text" name="stock" step="1" placeholder="Estoque" required>
        </div>
        <div class="cancelar" style="display: inline-block;"> 
            <a href="../">X CANCELAR</a>
        </div>
        <div class="confirmar" style="display: inline-block;">
            <input type="submit" value="Salvar">
        </div>
        </form>
        </div>
    </main>
</body>
</html>