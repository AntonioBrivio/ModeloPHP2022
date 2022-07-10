<?php

session_start();
//Verifica se o usuário está logado.
require 'acessocomum.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Ler os valores enviados pelo formulário
$date=filter_input(INPUT_POST,'date',FILTER_DEFAULT);
$time=filter_input(INPUT_POST,'time',FILTER_DEFAULT);

//Montar o DateTime do start e do end usando os dados do form
$start=new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));
$end = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));

//Soma 40 minutos no end (tempo do duração do evento)
$end = $end->modify('+40 minutes')->format("Y-m-d H:i:s");
$start=$start->format("Y-m-d H:i:s");

//Insere na tabela os valores dos campos
$sql = "INSERT INTO eventos(title, description, start, end, color, usuario_id) VALUES('Evento', 'Evento marcado por " . $_SESSION['nome'] . "', '$start', '$end', 'blue', " . $_SESSION['id'] . ")";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=eventoscontrolar.html" );	
  echo "Gravado com sucesso.";

//Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de aviso
$texto = "Evento marcado para " . $start;
$camponome = $_SESSION['nome'];
$campoemail = $_SESSION['email'];

enviaremail($camponome, $campoemail, 'Evento Marcado', $texto);

} else {
  header( "refresh:5;url=eventoscontrolar.html" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>