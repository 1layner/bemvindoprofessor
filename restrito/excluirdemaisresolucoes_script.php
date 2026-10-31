<?php include "../validar.php"; ?>
<?php

    require "conexao_bd.php";

    $iddocumento = $_POST['iddocumento'];

    $sql = "DELETE FROM table_documentos WHERE iddocumento='$iddocumento'";
    $query = mysqli_query($conexao, $sql);

    if($query){
        header("location: demaisresolucoes.php");
        exit;
    } else{
        echo mysqli_error($conexao);
    }

?>