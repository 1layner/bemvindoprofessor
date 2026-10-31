<?php include "../validar.php"; ?>
<?php
    require 'conexao_bd.php';

    $bncc = $_FILES['bncc'];
    $nome_foto = mover_foto($bncc);
    if($nome_foto == 0){
        $nome_foto = null;
    }

    mysqli_begin_transaction($conexao);

    try{    
        $sqlAlteraAtual = "UPDATE table_bncc SET atual = 0";
        $queryAlteraAtual = mysqli_query($conexao, $sqlAlteraAtual);

        if(!$queryAlteraAtual){
            throw new Exception(mysqli_error($conexao));
        }

        $sql="INSERT INTO table_bncc(bncc) VALUES('$nome_foto')";
        $query = mysqli_query($conexao, $sql);

        if(!$query){
            throw new Exception(mysqli_error($conexao));
        }

        mysqli_commit($conexao);

        header('location: bncc.php');
        exit;

    } catch(Exception $e){
        mysqli_rollback($conexao);

        echo "Erro ao realizar upload: " . $e->getMessage();
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