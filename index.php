<?php
include_once('nncode.php');
$code = new nncode;
if (isset($_POST['texto'])) {
    $entrada = $_POST['texto'];
    $texto = $code->nn_code($entrada);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nnCode</title>
    <style>
        body {background-color: #41854D;}
        h1,h2 {text-align:center;color:#c3c3c3;}
        .flux {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: flex-end;
            margin: 10px;
        }
        .camp {
            background-color: #41854D;
            border: 4px solid #65856B;
            border-radius: 20%;
            width: 570px;
            height: 440px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .saida {height:298px;width:510px;background-color:white;}
    </style>
</head>
<body>
    <h1>NNCode</h1>
    <div class="flux">
        <div class="camp">
            <h2>Inderir texto com NNCode</h2>
            <form action="index.php" method="post" autocomplete="off">
                <textarea name="texto" cols="70" rows="20"></textarea><br />
                <input type="submit" value="Mostrar texto">
            </form>
        </div>
        <div class="camp">
            <h2>Texto formatado com NNCode</h2>
            <div class="saida" style="z-index:10;">
                <?php if (isset($texto)) {
                    echo $texto;
                } ?>
            </div>
        </div>
    </div>

    <div class="flux">
        <div class="camp">
            <h2>Código gerado com NNCode</h2>
            <textarea cols="70" rows="20">
            <?php if (isset($texto)) {
                echo $texto;
            } ?>
            </textarea>
        </div>
        <div class="camp">
            <h2>Comandos do NNCode</h2>
            <iframe class="saida" src="comandos.txt" frameborder="0">
            </iframe>
        </div>
    </div>
</body>
</html>