<?php
    session_start();
    include_once("../conexao.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);


    $result_locador = "INSERT INTO locador(nome, cpf, numTel, criado) VALUES ('$nome', '$cpf', '$telefone', NOW())";
    
    $resultado_locador = mysqli_query($conn, $result_locador);

    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: locador.php");
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: cad_locador.php");
    }
?>