<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Faz a conexão com o BD.
require 'conexao.php';

//Une as duas tabelas com INNER JOIN
$sql = "SELECT
	cursos.id,
    cursos.nome,
    turmas.id,
    turmas.numero
FROM
    turmas
INNER JOIN
  cursos
ON turmas.curso_id = cursos.id";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
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
			<table>
<tr><th>Id</th><th>Número</th><th>Curso</th><th colspan="2">Ações</td></tr>
				
	<?php	
	  while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td><a href='alunoscontrolar.php?turma=" . $row["id"] . "'>" . $row["numero"] . "</td><td>" . $row["nome"] . "</td>";
					echo "<td><a href='turmaeditarform.php?id=" . $row["id"] . "'><img src='./imagens/editar.png' alt='Editar Turma'></a></td><td><a href='turmaexcluir.php?id=" . $row["id"] . "'><img src='./imagens/excluir.png' alt='Excluir Turma'></a></td></tr>";
		}
	?>
				
			</table>
</div>
 
    <a href="turmacadastrartela.php"><img src="./imagens/incluir.png" alt="Incluir Turma"></a>
    </div>
<div class="footer">
  <p>Projeto Final</p>
</div>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
?> 