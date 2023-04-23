<?php 

$hostname = "localhost";
$database = "login";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $database);
if($mysqli->connect_errno){
    echo "Falaha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno; 
}