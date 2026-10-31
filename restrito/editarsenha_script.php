<?php include "../validar.php"; ?>
<?php

    require 'conexao_bd.php';

    $idpessoa = $_POST['idpessoa'];
    $senhapessoa = $_POST['senhapessoa'];

    $senhapessoa = md5($senhapessoa);

    $sql = "UPDATE table_pessoa SET senhapessoa='$senhapessoa' WHERE idpessoa = '$idpessoa'";
    $query = mysqli_query($conexao, $sql);

    if($query){
        header("location: configuracoes.php");
    } else{
        echo mysqli_error($conexao);
    }

?>