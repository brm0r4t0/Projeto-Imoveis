<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $numDias = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

    $result_aluga = "UPDATE aluga SET numDias='$numDias', dataInicio='$date', valorAluguel='$valor', modificado=NOW() WHERE id='$id';";
    $resultado_aluga = mysqli_query($conn, $result_aluga);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Aluga foi editado com sucesso</p>";
        header("Location: aluga.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Aluga não foi editado com sucesso</p>";
        header("Location: edit_aluga.php");
    }
?>