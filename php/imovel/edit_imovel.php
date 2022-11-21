<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_imovel = "SELECT * FROM imovel WHERE id = '$id'";
    $resultado_imovel = mysqli_query($conn, $result_imovel);
    $row_imovel = mysqli_fetch_assoc($resultado_imovel);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CRUD - Editar</title>
    </head>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147,220), rgb(17, 54, 71));
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
            color: white;
        }
        fieldset {
            border: 3px solid dodgerblue;
        }
        legend {
            border: 1px, solid, dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox {
            position: relative;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #dat {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit {
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(0, 80, 197), rgb(80, 19, 220));
        }
    </style>
    <body>
        <a href="cad_imovel.php">Cadastrar</a><br>
        <a href="imovel.php">Listar</a><br>
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div class="box">
            <form method="POST" action="proc_edit_imovel.php">
            <fieldset>
            <legend>Editar Locatario</legend>
            <br>
            <input type="hidden" name="id" value="<?php echo $row_imovel['id']; ?>"> 
            
            <div class="inputBox">
                <input type="text" name="numIptu" required class="inputUser" value="<?php echo $row_imovel['numRegIPTU']; ?>"><br><br>         
                <label class="labelInput">Numero de redistro do IPTU</label>
            </div>
            <br><bn><br>
            <div class="inputBox">
                <input type="text " name="endereco" class="inputUser" required value="<?php echo $row_imovel['endereco']; ?>"><br><br>  
                <label class="labelInput">Endereço</label>
            </div>
            <br><bn><br>
            <div class="inputBox">
                <input type="text" name="valor" class="inputUser" required value="<?php echo  $row_imovel['valorDiaria']; ?>"><br><br>
                <label class="labelInput">Valor da Diária</label>
            </div>
            <br><br><br>
                <input type="submit" id="submit">
        </fieldset>
            </form>
        </div>
    </body>
</html>
