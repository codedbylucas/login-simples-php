<?php
include('./config/conexao.php');

//Função para verificar se existe a variavel e-mail e senha.

//isset = se existir e-mail ou existir senha                                        
if (isset($_POST['email']) || isset($_POST['senha'])) {
    // strlen = quantidade de caracteres 
    if (strlen($_POST['email']) == 0) {
        echo 'Preencha seu e-mail';
    } else if (strlen($_POST['senha']) == 0) {
        echo 'Preencha sua senha';
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        //Puxando todos os campos da tabela usuario 
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);

        //Verifica a quantidade de registros que a consulta acima retornou para saber se o usuario existe
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            //incluindo os dados retornados dentro da variavel usuario
            $usuario = $sql_query->fetch_assoc();

            //Se não exister sessão
            if (!isset($_SESSION)) {
                //Começar nova sessão
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            //Redirecionar usuario para painel.php
            header("Location: painel.php");
        } else {
            echo "Falha ao logar! E-mail ou Senha incorretos";
        }
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
                </div>
            </div>
        </form>
    </div>
</body>

</html>