<?php include "../validar.php"; ?>
<?php

    require "conexao_bd.php";

    $nomedocumento = $_POST['nomedocumento'];
    $documento = $_FILES['documento'];
    $nome_foto = mover_foto($documento);
    if($nome_foto == 0){
        $nome_foto = null;
    }


    $sql = "INSERT INTO table_documentos(nomedocumento, documento) VALUES('$nomedocumento', '$nome_foto')";
    $query = mysqli_query($conexao, $sql);

    if($query){
        header("location: demaisresolucoes.php");
        exit;
    } else{
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    function mover_foto(array $vetor_foto){
        $vtipo = explode("/", $vetor_foto['type']);
        $tipo = $vtipo[0] ?? '';
        $extensao = "." . ($vtipo[1] ?? '');
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000)){
            $nome_arquivo = date('Ymdhs') . $extensao;
            move_uploaded_file($vetor_foto['tmp_name'], "documentos/" . $nome_arquivo);
            return $nome_arquivo;
        } else{
            return 0;
        }
    }

?>