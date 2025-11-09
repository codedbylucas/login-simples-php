<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <div class="index">
        <form action="../controller/LoginController.php" method="POST">
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
            <?php
            if (!empty($_GET['mensagem'])) {
                echo $_GET['mensagem'];
            }
            ?>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/validarForms.js"></script>

</html>