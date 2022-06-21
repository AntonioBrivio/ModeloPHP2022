<?php
session_start();

//Verifica o acesso.
require 'acessocomum.php';

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];

if($campoid!=$SESSION['ID']){
	header('location:principal.php');
	exit;
}

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios WHERE Id = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Editar Usuário</title>
    </head>
    <body>
        <form action="usuarioeditarcodigocomum.php" method="post">
            <h3>Editar Usuário Id: <?php echo $row["Id"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["Id"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome..." required>		
            <input type="email" name="email" value="<?php echo $row["Email"]; ?>" placeholder="Seu e-mail..." required>	          
            <input type="submit" value="Editar">
        </form>
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	


?> 