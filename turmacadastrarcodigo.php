<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

// Dados do Formulário
$camponumero = intval(filter_input(INPUT_POST, 'numero'));
$campocurso_id = intval(filter_input(INPUT_POST, 'curso_id'));    
	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO turmas(numero, curso_id) VALUES($camponumero, $campocurso_id)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=turmascontrolar.php" );	
  echo "Gravado com sucesso.";
  
include 'log.php';

} else {
  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 


?>