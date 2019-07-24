# NNCode
NNCode é um pequeno código em PHP baseado no BBCode. Ele converte tags simples em tags HTML.

NNCode é a abreviação de Nenem Code, um trocadilho visto que no Brasi as pessoas leem Bebê Code(BBCode).

Para utiliza-lo basta incluir o arquivo **nncode.php** em seu projeto e utilizar a função **nn_code** para que as tags criadas retornem tags html com seu conteúdo formatado:
```
<?php
include_once('nncode.php');
$code = new nncode;
$saida = $code->nn_code("[b][color=#f00]Texto aqui[/color][/b]");
echo $saida;
?>
```
Para utilizar com banco de dados, a melhor forma é cadastrar o texto escrito com as tags do NNCode assim o texto cadastrado fica mais organizado e depois retornar o texto em uma página HTML, ficando todo formatado. O arquivo **example.php** mostra um pequeno exemplo de cadastro em um Banco de Dados.

Para formatar o texto, deve coloca-lo entre as tags como seria feito no HTML:
```
[b]Texto aqui[/b]
[center][i]Outro texto aqui[i][/center]
```
