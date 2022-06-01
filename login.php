<?php
session_start();
if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuarios where email='$campoemail'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {

			//O EasyPHP não tem password_hash, por isso deixei as duas opções
			//$verificado = password_verify($camposenha, $row["Senha"]);
			//if($verificado){			
			if($camposenha == $row["Senha"]){
				$_SESSION['nome'] = $row["Nome"];
				$_SESSION['acesso'] = $row["Acesso"];
				header('Location: principal.php');
				exit;
			}else{
			  header( "refresh:5;url=index.html" );
				echo "<br>" . 'Senha Errada';  
				exit;  
			}
	//Se a consulta não tiver resultados  			
	} else {
		header('Location: index.html'); //Redireciona para o form
		exit; // Interrompe o Script
	}
//Se o usuário não usou o formulário
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

//Fecha a conexão.
$conn->close();
?> 