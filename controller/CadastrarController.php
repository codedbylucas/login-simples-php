<?php
include('../config/conexao.php');
$pdo = Conexao::conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        header("Location: ../view/cadastrar.php?mensagem=Preencha todos os campos!");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/cadastrar.php?mensagem=Email Invalido!");
        exit;
    }

    $sqlValidacao = 'SELECT * FROM usuarios WHERE email = :email';
    $stmt = $pdo->prepare($sqlValidacao);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount()) {
        header("Location: ../view/cadastrar.php?mensagem=Existe um email já cadastrado!");
        exit;
    }

    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $sqlCadastro = 'INSERT INTO usuarios (email, senha) VALUES (:email, :senha)';
    $stmtCadastro = $pdo->prepare($sqlCadastro);
    $stmtCadastro->bindValue(':email', $email);
    $stmtCadastro->bindValue(':senha', $hash);

    if ($stmtCadastro->execute()) {
        header("Location: ../view/cadastrar.php?mensagem=Usuario cadastrado com sucesso!");
        exit;
    } else {
        header("Location: ../view/cadastrar.php?mensagem=Erro ao cadastrar usuario!");
        exit;
    }
}
?>