<?php
    session_start();
    include_once("../conexao.php");

    $numIptu = filter_input(INPUT_POST, 'numIptu', FILTER_SANITIZE_NUMBER_INT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

    
    $result_imovel = "INSERT INTO imovel(numRegIPTU, endereco, valorDiaria, criado) VALUES ('$numIptu', '$endereco', '$valor', NOW());";
    
    $resultado_imovel = mysqli_query($conn, $result_imovel);

    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Imovel cadastrado com sucesso</p>";
        header("Location: imovel.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Imovel não foi cadastrado com sucesso</p>";
        header("Location: cad_imovel.php");
    }
?>