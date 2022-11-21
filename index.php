<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MENU PRINCIPAL</title>
        <link rel="stylesheet" href="./css/style.css" type="text/css" charset="utf-8">
    </head>
    <style type="text/css">
        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
        }
        a {
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 15px;
            padding: 10px;
        }
        a:hover{
            background-color: dodgerblue;
        }
        h1 {
            color: white;
            width: 350px; 
            margin-left: 550px;
            margin-right: auto; 
        }
        img {   
            width: 200px;
            height: 127px;
            position: absolute;
            left: 50px;
            top: 20px;
        }
    </style>
    <body>

        <h1>SISTEMA DE IMÓVEIS</h1>

        <img src="./img/Logo_CEFET-MG.png">
        <div class="box">
            <a href="php/aluga/aluga.php" class="linkMenu">Aluga</a>&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="php/imovel/imovel.php" class="linkMenu">Imovel</a>&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="php/locador/locador.php" class="linkMenu">Locador</a>&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="php/locatario/locatario.php" class="linkMenu">Locatario</a>&nbsp&nbsp&nbsp&nbsp&nbsp
        </div>
    </body>
</html> 
