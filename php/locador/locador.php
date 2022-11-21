<?php
    session_start();
    include_once("../conexao.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CRUD - Listar</title>
    </head>
    <body>
        <a href="../../index.php">Menu Principal</a><br>    
        <a href="cad_locador.php">Cadastrar</a><br>
                            
        <h1>Listar Locador</h1>
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por paginas
            $qnt_result_pg = 3;

            //Calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $result_locador = "SELECT * FROM locador LIMIT $inicio, $qnt_result_pg";
            $resultado_locador = mysqli_query($conn, $result_locador);
            
            while($row_locador = mysqli_fetch_assoc($resultado_locador)) {
                echo "ID: " . $row_locador['id']. "<br>";
                echo "Nome: " . $row_locador['nome']. "<br>";
                echo "CPF: " . $row_locador['cpf']. "<br>";
                echo "Telefone: " . $row_locador['numTel']. "<br>";
                echo "<a href='edit_locador.php?id=" . $row_locador['id'] . "'>Editar</a>" . "<br>";
                echo "<a href='proc_apag_locador.php?id=" . $row_locador['id'] . "'>Apagar</a><hr>";  
            }

            //Paginação - Somar a quantidade de usuários
            $result_pg = "SELECT COUNT(id) As num_result FROM locador";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'] . "<br><br>";

            //Quantidade de página
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
            
            //Limitar os links antes depois
            $max_links = 2;
            echo " <a href='locador.php?pagina=1'>Primeira</a>    ";
        
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
                if($pag_ant >= 1)
                    echo "   <a href='locador.php?pagina=$pag_ant'>$pag_ant</a>  ";
            }
            for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++) {
                if($pag_post <= $quantidade_pg)
                    echo "<a href='locador.php?pagina=$pag_post'>$pag_post</a>  ";
            }

            echo "<a href='locador.php?pagina=$quantidade_pg'>Ultima</a>  " . "<br><br>";
            
            echo "Página " . " $pagina";
        ?>
    </body>
</html>
