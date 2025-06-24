<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Divertido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(120deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            color: white;
            animation: fadeIn 1.5s ease;
        }

        .painel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            text-align: center;
            animation: slideIn 1s ease-out;
        }

        h1 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        p {
            margin-top: 30px;
        }

        a {
            display: inline-block;
            background-color: #ffffff22;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            font-weight: bold;
        }

        a:hover {
            background-color: #fff;
            color: #2575fc;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="painel">
        <h1>Bem-vindo ao Painel, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <p>
            <a href="logout.php">Sair</a>
        </p>
    </div>

</body>
</html>
