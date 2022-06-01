<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Lê a página que será exibida
$turma_id = $_GET["turma"];

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM alunos where turma_id = $turma_id";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
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
</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">


			<h1>Lista de Alunos</h1>
			<table>
<tr><th>Id</th><th>Nome</th><th colspan="2">Ações</td></tr>
				
	<?php
	
	  while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td>";
					echo "<td><a href='alunoeditarform.php?id=" . $row["id"] . "'><img src='./imagens/editar.png' alt='Editar aluno'></a></td><td><a href='alunoexcluir.php?id=" . $row["id"] . "'><img src='./imagens/excluir.png' alt='Excluir aluno'></a></td></tr>";
			}
		
	?>
				
			</table>
</div>
 
            <a href="alunocadastrartela.php"><img src="./imagens/incluir.png" alt="Incluir aluno"></a>
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
	
//Se o usuário não usou o formulário
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?> 