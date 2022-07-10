<html>
<head>
<title>Usuário Cadastrar</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/form.css">
</head>
<body>
<?php
session_start();
//Verifica se o usuário está logado.
//require 'acessocomum.php';

//Lê a data e hora clicadas pelo usuário.
$date=new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));
?>
<form name="formAdd" id="formAdd" method="post" action="eventocadastrarcodigo.php">
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>" readonly><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>" readonly><br>
    Usuário: <input type="text" name="title" id="title" value="<?php echo $_SESSION['nome']; ?>" readonly>
    <input type="submit" value="Confirmar">
</form>

</body>
</html>
