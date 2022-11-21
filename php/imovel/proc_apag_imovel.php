<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_imovel = "DELETE FROM imovel WHERE id='$id'";
    $resultado_imovel = mysqli_query($conn, $result_imovel);

    if(!empty($id)){
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Imovel $id apagado com sucesso</p>";
            header("Location: imovel.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Erro o imovel não foi apagado com sucesso</p>";
            header("Location: imovel.php");
        }
    }else{	
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um imovel</p>";
        header("Location: imovel.php");
    }
?>