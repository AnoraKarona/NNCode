<?php
// Pequeno exemplo de utilização do NNCode com Banco de Dados

/* ***Banco de dados para cadastro e consulta***

create database db_here;
use db_here;
create table table_here(
	texto text
);
select * from table_here;
*/

$servidor = "host";
$usuario = "user_here";
$senha = "password_here";
$database = "db_here";

try {
    $conexao = new PDO("mysql:host=${servidor};dbname=${database}", $usuario, $senha);
} catch (PDOException $e) {
    echo $e->getMessage();
}

include_once('nncode.php');
$code = new nncode;

if (isset($_POST['texto'])) {
    $entrada = nl2br($_POST['texto']);
    if (empty($entrada)) {
        $msg = 'Sorry, nothing to do!';
    } else {
        $query = $conexao->prepare('INSERT INTO table_here(texto) VALUES(?)');
        $query->bindValue(1, $entrada);
        $query->execute();
        $msg = 'Successfully registered content!';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NNCode - Example DB</title>

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
        <?php if (isset($msg)) { ?>
            <small color="#F00">
                <?php echo $msg; ?>
            </small>
        <?php } ?>
    <div class="flux">
        <div class="camp">
            <h2>Inderir texto com NNCode</h2>
            <form action="example.php" method="post" autocomplete="off">
                <textarea name="texto" cols="70" rows="20"></textarea><br />
                <input type="submit" value="Mostrar texto">
            </form>
        </div>
        <div class="camp">
            <h2>Texto formatado com NNCode</h2>
            <div class="saida" style="z-index:10;">
                <?php
                $query = $conexao->prepare('SELECT * FROM table_here LIMIT 1');
                $query->execute();
                $result = $query->fetch();
                if (isset($result)){
                    $texto = $code->nn_code($result['texto']);
                }
                if (isset($texto)) {
                    echo $texto;
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>