<?php
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($check) == 0){
        mysqli_query($conn, "INSERT INTO users(username, password) VALUES('$username', '$password')");
        header("Location: index.php");
    } else {
        $error = "Usuário já existe!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="entrar.css">
</head>
<body>

<main class="main">
            <div class="container">
                <div class="login">
                    <form method="POST">
                        <h1 class="titulo">Register</h1>

                        <div class="email">
                            <img src="imag/email.png" alt="email" />
                            <input type="text" name="username" placeholder="Usuário" required>
                        </div>

                        <div class="senha">
                            <img src="imag/senha.png" alt="senha" />
                            <input type="password" name="password" placeholder="Senha" required>
                        </div>

                        <div class="entrar">
                            <button type="submit">Cadastrar</button>
                            <a href="index.php">Voltar</a>
                        </div>
                    </form>
                </div>

                <div class="imagem"></div>
            </div>
        </main>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>