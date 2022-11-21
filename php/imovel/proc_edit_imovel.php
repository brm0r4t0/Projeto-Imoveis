<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $numIptu = filter_input(INPUT_POST, 'numIptu', FILTER_SANITIZE_NUMBER_INT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

    $result_imovel = "UPDATE imovel SET numRegIPTU='$numIptu', endereco='$endereco', valorDiaria='$valor', modificado=NOW() WHERE id='$id';";
    $resultado_imovel = mysqli_query($conn, $result_imovel);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Imovel foi editado com sucesso</p>";
        header("Location: imovel.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Imovel não foi editado com sucesso</p>";
        header("Location: proc_edit_imovel.php");
    }
?>