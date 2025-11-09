<?php
include('../config/conexao.php');

$pdo = Conexao::conectar();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        header("Location: ../view/index.php?mensagem=Preencha todos os campos!");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/index.php?mensagem=Email Invalido!");
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

        header('Location: ../view/painel.php');
        exit;
    } else {
        header("Location: ../view/index.php?mensagem=Email ou Senha incorretos!");
        exit;
    }
}
?>
