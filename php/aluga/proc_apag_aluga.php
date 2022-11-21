<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_aluga = "DELETE FROM aluga WHERE id='$id'";
    $resultado_aluga = mysqli_query($conn, $result_aluga);

    if(!empty($id)){
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Aluga $id apagado com sucesso</p>";
            header("Location: aluga.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Erro o aluga não foi apagado com sucesso</p>";
            header("Location: aluga.php");
        }
    }else{	
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um aluga</p>";
        header("Location: aluga.php");
    }
?>