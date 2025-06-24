<?php
include('./config/conexao.php');

$pdo = Conexao::conectar();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        echo 'Preencha todos os campos';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'E-mail inválido';
        exit;
    }

    $sql = 'SELECT * FROM usuarios WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario['email']; 

        header('Location: painel.php');
        exit;
    } else {
        echo 'E-mail ou senha incorretos';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="index">
        <form action="" method="POST">
            <h1 class="cadastro" style="color:aliceblue">Login</h1>
            <div class="cadastro">
                <div class="content">
                    <label>E-mail</label>
                    <input type="text" placeholder="E-mail" name="email">

                    <label>Senha</label>
                    <input type="password" placeholder="Senha" name="senha">

                    <button type="submit">Acessar</button>

                    <label for="">
                        Não tem login?
                        <a href="cadastrar.php" style="text-decoration: none;">Cadastre-se</a>

                    </label>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="validarForms.js"></script>

</html>