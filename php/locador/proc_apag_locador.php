<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_locador = "DELETE FROM locador WHERE id='$id'";
    $resultado_locador = mysqli_query($conn, $result_locador);

    if(!empty($id)){
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário $id apagado com sucesso</p>";
            header("Location: locador.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
            header("Location: locador.php");
        }
    }else{	
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
        header("Location: locador.php");
    }
?>