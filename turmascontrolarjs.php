<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Modelo PHP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">
<link rel="stylesheet" href="./css/menu.css">
<link rel="stylesheet" href="./css/padrao.css">

<!-- PDF I - Bibliotecas para gerar PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script>

<!-- PDF II - Arquivo com o código para gerar PDF -->
<script src="./scripts/pdf.js"></script>

</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">

<h1>Lista de Turmas</h1>
<!-- PDF III - Botão que aciona a função getPDF() no arquivo pdf.js -->
    <form><input type="button" value="Gerar PDF" onclick="getPDF()"></form>

<!-- JS I - Todo o código SQL foi removido. Veja turmaslistar.js e turmaslistar.php -->
<span id="tabela"></span>

<script src="./scripts/turmaslistar.js"></script>

</div>
 
    <a href="turmacadastrartela.php"><img src="./imagens/incluir.png" alt="Incluir Turma"></a>
    </div>
<div class="footer">
  <p>Projeto Final</p>
</div>

</body>
</html>