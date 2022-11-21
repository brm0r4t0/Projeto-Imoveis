<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CRUD - Cadastrar</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" charset="utf-8"/>
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
        <a href="../../index.php">Menu Principal</a><br>
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div class="box">
        <form method="POST" action="proc_cad_locatario.php">
                <fieldset>
                    <legend>Cadastro Locatario</legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" class="inputUser" required>
                        <label class="labelInput">Nome:</label>
                    </div>
                    <br><br><br>
                    <div class="inputBox">
                        <input type="text" name="cpf" class="inputUser" required>
                        <label class="labelInput">CPF</label>
                    </div>
                    <br><br><br>
                    <div class="inputBox">
                        <input type="text" name="telefone" class="inputUser" required><br><br>
                        <label class="labelInput">Telefone</label>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit">
                </fieldset>
            </form>
        </div>
    </body>
</html>
