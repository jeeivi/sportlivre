<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$products = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cards.css">
</head>

<body>
    
    <div class="sport">
        <h1 class="text">Sport Livre </h1>
    </div>

    <div class="controle">
        <h2>Controle de Estoque</h2>
        

        <div class="buscar">
            <a href="addProduct.php">Novo Produto</a><br>
            <a href="homeUsers.php">Gerenciar users</a><br>
            <a href="logout.php">Sair</a><br>
        </div>
    </div>

    


    <div class="tabela">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                        <a href="editProduct.php?id=<?php echo $row['id']; ?>">Editar</a> |
                        <a href="deleteProduct.php?id=<?php echo $row['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>