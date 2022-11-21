<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

    $result_locatario = "UPDATE locatario SET nome='$nome', cpf='$cpf', numTel='$telefone', modificado=NOW() WHERE id='$id';";
    $resultado_locatario = mysqli_query($conn, $result_locatario);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário foi editado com sucesso</p>";
        header("Location: locatario.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
        header("Location: edit_locatario.php");
    }
?>