<?php
session_start();
include("db.php");

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($result) == 1){
        $_SESSION['user'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="entrar.css">
</head>
<body>
<main class="main">
            <div class="container">
                <div class="login">
                    <form method="POST">
                        <h1 class="titulo">Login</h1>

                        <div class="email">
                            <img src="imag/email.png" alt="email" />
                            <input type="text" name="username" placeholder="Usuário" required>
                        </div>

                        <div class="senha">
                            <img src="imag/senha.png" alt="senha" />
                            <input type="password" name="password" placeholder="Senha" required><br>
                        </div>

                        <div class="entrar">
                           <button type="submit">Entrar</button>
                           <a href="register.php">Criar conta</a>
                        </div>
                    </form>
                </div>

                <div class="imagem"></div>
            </div>
        </main>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>