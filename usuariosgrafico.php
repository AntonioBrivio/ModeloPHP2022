<?php

//Faz a conexão com o BD.
require 'conexao.php';

//Conta a quantidade total de registros por acesso
$sql1 = "SELECT count(*) as ADM FROM usuarios WHERE acesso='Admin'";
$sql2 = "SELECT count(*) as Comum FROM usuarios WHERE acesso='Comum'";

//Executa o SQL
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

//Prepara as contagens
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();	

//Monta os dados
$dados = [$row1["ADM"], $row2["Comum"]];

//Cria retorno de dados com status.
$retorna = ['status' => true, 'dados' => $dados];

//Transforma em json. O arquivo só pode ter um echo.
//O JS lerá esse echo	
echo json_encode($retorna);

//Fecha a conexão.	
$conn->close();
	
?>