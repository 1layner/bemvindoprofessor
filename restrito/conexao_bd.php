<?php
$servidor = "localhost";
$usuario = "root";
$senha = "root";
$bancoDados = "bemvindoprofessor";

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados);

if(mysqli_connect_error()){
    echo "Problemas para conectar no banco de dados. Verifique os dados.";
    mysqli_connect_error();
} else{}




?>