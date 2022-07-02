 <?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');
$campostatus = filter_input(INPUT_GET, 'status');
 
//Faz a conexão com o BD.
require 'conexao.php';

if($campostatus=="ativo"){

// Bloquear usuário o registro com o id
$sql = "UPDATE usuarios SET Status='inativo' WHERE id=$campoid";

}else{
    
$sql = "UPDATE usuarios SET Status='ativo' WHERE id=$campoid";
}

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Usuário bloqueado";
  
  include 'log.php';
  
   header('Location: usuarioscontrolar.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 