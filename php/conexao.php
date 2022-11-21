<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "server123";
    $dbname = "imoveis";

    //Criar a conexão
    $conn = new mysqli($servidor, $usuario, $senha, $dbname);

    if($conn->connect_errno) {
        echo "Falha ao conectar ao: (" .  $conn->connect_errno . ") " . $conn->connect_error;
    }
?>
