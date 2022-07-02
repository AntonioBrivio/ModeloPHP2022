<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'acesso');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuarios SET nome='" . $camponome . "', email='" . $campoemail . "', acesso='" . $campoacesso . "' WHERE id=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: usuarioscontrolar.php?pag=1'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	

?> 