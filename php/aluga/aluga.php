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
        <a href="cad_aluga.php">Cadastrar</a><br>
                            
        <h1>Lista Aluga</h1>
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

            $result_aluga = "SELECT * FROM aluga LIMIT $inicio, $qnt_result_pg";
            $resultado_aluga = mysqli_query($conn, $result_aluga);
            
            while($row_aluga = mysqli_fetch_assoc($resultado_aluga)) {
                echo "Numero de Dias: " . $row_aluga['numDias']. "<br>";
                echo "Data de inicio: " . $row_aluga['dataInicio']. "<br>";
                echo "Valor do Aluguel: " . $row_aluga['valorAluguel']. "<br>";
                echo "<a href='edit_aluga.php?id=" . $row_aluga['id'] . "'>Editar</a>" . "<br>";
                echo "<a href='proc_apag_aluga.php?id=" . $row_aluga['id'] . "'>Apagar</a><hr>";  
            }

            //Paginação - Somar a quantidade de usuários
            $result_pg = "SELECT COUNT(id) As num_result FROM aluga";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'] . "<br><br>";

            //Quantidade de página
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
            
            //Limitar os links antes depois
            $max_links = 2;
            echo " <a href='aluga.php?pagina=1'>Primeira</a>    ";
        
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
                if($pag_ant >= 1)
                    echo "   <a href='aluga.php?pagina=$pag_ant'>$pag_ant</a>  ";
            }
            for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++) {
                if($pag_post <= $quantidade_pg)
                    echo "<a href='aluga.php?pagina=$pag_post'>$pag_post</a>  ";
            }

            echo "<a href='aluga.php?pagina=$quantidade_pg'>Ultima</a>  " . "<br><br>";
            
            echo "Página " . " $pagina";
        ?>
    </body>
</html>
