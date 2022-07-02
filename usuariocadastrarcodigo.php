<?php
session_start();
//Só administrador pode acessar 
require 'acessoadm.php';

// Dados do Formulário
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'acesso');

//O EasyPHP não tem password_hash, por isso deixei as duas opções
$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
//$camposenha = filter_input(INPUT_POST, 'senha');       

//Verifica campos vazios. 
//Se o filtro encontrar caracter proibido, a variável estará em branco.
if(!$camponome || !$campoemail || !$campoacesso || !$camposenha){
	header("Location: usuariocadastrartela.php?erro=1");
	exit;
}

//Faz a conexão com o BD.
require 'conexao.php';

//Verifica email duplicado e retorna erro.
$sql = "select * from usuarios where Email='$campoemail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	header("Location: usuariocadastrartela.php?erro=2");
	exit;	
}


//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(nome, email, senha, acesso, status, validador) VALUES('$camponome', '$campoemail', '$camposenha', '$campoacesso', 'aguardando', $validador)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=usuarioscontrolar.php?pag=1" );	
  echo "Gravado com sucesso.";

//Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de validação
$texto = "Clique <a href='aulahtmlcss.000webhostapp.com/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador . "'>aqui</a>.";

enviaremail($camponome, $campoemail, 'Validar conta', $texto);

} else {
//  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>