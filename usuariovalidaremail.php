<?php
session_start();

//Dados do formulário
$campoemail = $_GET["id"];
$validador = $_GET["validador"];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuarios SET Status='ativo' WHERE status='aguardando' and email='" . $campoemail . "' and validador=" . $validador;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  //Grava alteração no log.
  include 'log.php';
  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?> 