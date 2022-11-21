<?php
    session_start();
    include_once("../conexao.php");

    $numDias = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

    $result_aluga = "INSERT INTO aluga(numDias, dataInicio, valorAluguel, criado) VALUES ('$numDias', '$date', '$valor', NOW());";
    
    $resultado_aluga = mysqli_query($conn, $result_aluga);

    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Aluga cadastrado com sucesso</p>";
        header("Location: aluga.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Aluga não foi cadastrado com sucesso</p>";
        header("Location: cad_aluga.php");
    }
?>