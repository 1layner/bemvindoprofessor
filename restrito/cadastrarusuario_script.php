<?php include "../validar.php"; ?>
<?php
    require 'conexao_bd.php';

    $nomepessoa = clear($conexao, $_POST['nomepessoa']);
    $email = clear($conexao, $_POST['email']);
    $senhapessoa = clear($conexao, $_POST['senhapessoa']);
    $hierarquia = clear($conexao, $_POST['hierarquia']);
    $disciplina = clear($conexao, $_POST['disciplina']);

    $senhapessoa = md5($senhapessoa);


    $disciplina = !empty($disciplina) ? intval($disciplina) : "NULL";
    $hierarquia = !empty($hierarquia) ? intval($hierarquia) : "NULL";
           //  $sql = "INSERT INTO `table_pessoa` (nomepessoa, senhapessoa, email, disciplina, hierarquia) VALUES ('$nomepessoa', '$senhapessoa', '$email', $disciplina, $hierarquia)";
    $query = mysqli_query($conexao, "INSERT INTO `table_pessoa`(`nomepessoa`, `senhapessoa`, `email`, `disciplina`, `hierarquia`) VALUES('$nomepessoa', '$senhapessoa', '$email', $disciplina, $hierarquia)"); 

    if($query){
        header("location: configuracoes.php");
        exit;
    } else{
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
    
    function clear($conexao, $texto_puro){
        $texto = mysqli_real_escape_string($conexao, $texto_puro);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

?>