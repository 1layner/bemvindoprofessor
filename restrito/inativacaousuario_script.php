<?php include "../validar.php"; ?>
<?php
    require "conexao_bd.php";

    $idpessoa = $_POST['idpessoa'];
    $inativo = $_POST['inativo'];

    $idpessoa = intval($_POST['idpessoa']);
    $inativo = intval($_POST['inativo']);

    if($inativo == 1){
        $inativo = 0;
    } else{
        $inativo = 1;
    }

    $sql="UPDATE table_pessoa SET inativo = $inativo WHERE idpessoa = $idpessoa";
    $query = mysqli_query($conexao, $sql);

    if($query){
        header("location: configuracoes.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }


?>