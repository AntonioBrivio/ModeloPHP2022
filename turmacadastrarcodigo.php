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

// Dados do Formulário
$camponumero = intval($_POST["numero"]);
$campocurso_id = intval($_POST["curso_id"]);    
	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO turmas(numero, curso_id) VALUES($camponumero, $campocurso_id)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=turmascontrolar.php?pag=1" );	
  echo "Gravado com sucesso.";
  
include 'log.php';

} else {
  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 


?>