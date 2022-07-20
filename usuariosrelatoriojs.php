<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Tela Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">
<link rel="stylesheet" href="./css/menu.css">
<link rel="stylesheet" href="./css/padrao.css">

<script src="./scripts/filtrar.js"></script>

</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">


	<h1>Relatório de Usuários</h1>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<script src="./scripts/usuariosgrafico.js"></script>
					

</div>

	<div class="grafico">
	    <canvas id="myChart"></canvas>
	</div>



  
           
</div>





<div class="footer">
<?php require 'rodape.php'; ?>
</div>

</body>
</html>
 