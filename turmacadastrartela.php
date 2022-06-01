<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM cursos ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>	
<html>
<head>
<title>Turma Cadastrar</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/form.css">
</head>
<body>		
	<form action="turmacadastrarcodigo.php" method="post">
	<h3>Cadastrar Turma</h3>
	<input type="text" name="numero" placeholder="Número da turma..." required>		
	<select name='curso_id'>
<?php
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {			
			echo "<option value=" . $row["id"] . ">" . $row["nome"] . "</option>";
		}
	}
?>	
</select>
	<input type="submit" value="Enviar">
	</form>

</body>
</html>