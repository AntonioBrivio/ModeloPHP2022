<?php
session_start();
//Só administrador pode acessar 
require 'acessoadm.php';

// Dados do Formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$campoacesso = $_POST["acesso"];

//O EasyPHP não tem password_hash, por isso deixei as duas opções

$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

//$camposenha = $_POST["senha"];       

	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(nome, email, senha, acesso, status) VALUES('$camponome', '$campoemail', '$camposenha', '$campoacesso', 'ativo')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=usuarioscontrolar.php?pag=1" );	
  echo "Gravado com sucesso.";
  
include 'log.php';

} else {
  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>