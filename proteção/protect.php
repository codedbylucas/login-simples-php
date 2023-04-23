



<!--Função para não permitir pessoas que não estão logadas acessar a pagina-->

<?php
    //Se não exister sessão
   if(!isset($_SESSION)){
    //Começar nova sessão
    session_start();
}
//Não tem nenhuma sessao de ID criada nessa pagina, ex:  $_SESSION['id'] = $usuario['id'];, 
//Então ele mata o script não permitindo o usuario acessar a pagina
if(!isset($_SESSION['id'])){
    die("Você nao pode acessar essa pagina, porque você não está logado. 
    <p> 
    <a href=\"index.php\>Entrar</a> 
    </p>");
}

?>