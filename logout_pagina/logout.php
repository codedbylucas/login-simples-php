<?php
    //Se não exister sessão
   if(!isset($_SESSION)){
    //Começar nova sessão
    session_start();
}
//Se existir uma sessão, no caso se o usuario estiver logado, esse comando vai destruir as variaveis assim deixando de estar salvas deslogando o usuario.
session_destroy();

//Redirecionando usuario para index.php ou seja a tela de login. 
header("Location: index.php");