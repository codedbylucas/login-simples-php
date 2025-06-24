<?php
include('./config/conexao.php');
$pdo = Conexao::conectar();

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

    $sqlValidacao = 'SELECT * FROM usuarios WHERE email = :email';
    $stmt = $pdo->prepare($sqlValidacao);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount()) {
        echo 'Já tem um email desse cadastrado';
        exit;
    }

    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $sqlCadastro = 'INSERT INTO usuarios (email, senha) VALUES (:email, :senha)';
    $stmtCadastro = $pdo->prepare($sqlCadastro);
    $stmtCadastro->bindValue(':email', $email);
    $stmtCadastro->bindValue(':senha', $hash);

    if ($stmtCadastro->execute()) {
        echo 'Usuário cadastrado com sucesso';
    } else {
        echo 'Erro ao cadastrar usuário';
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
            <h1 class="cadastro" style="color:aliceblue">Cadastrar-se</h1>
            <div class="cadastro">
                <div class="content">
                    <label>E-mail</label>
                    <input type="text" placeholder="E-mail" name="email">

                    <label>Senha</label>
                    <input type="password" placeholder="Senha" name="senha">

                    <button type="submit">Cadastrar</button>
                    <a href="index.php" style="text-decoration: none;">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="validarForms.js"></script>

</html>