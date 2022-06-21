<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

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
<title>Modelo PHP</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/form.css">
</head>
<body>		
	<form action="turmacadastrarcodigo.php" method="post">
	<h3>Cadastrar Turma</h3>
	<input type="text" name="numero" placeholder="Número da turma..." required>		
	<select name='curso_id' required>
	<option value=""></option>
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