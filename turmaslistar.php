<?php

//Faz a conexão com o BD.
require 'conexao.php';

//Une as duas tabelas com INNER JOIN
$sql = "SELECT
	cursos.id,
    cursos.nome,
    turmas.id as id_turma,
    turmas.numero
FROM
    turmas
INNER JOIN
  cursos
ON turmas.curso_id = cursos.id";

//Executa o SQL
$result = $conn->query($sql);
$dados = "<table><tr><th>Id</th><th>Número</th><th>Curso</th></tr>";
	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

//Monta os dados
while($row = $result->fetch_assoc()) {
$dados .= "<tr><td>" . $row["id_turma"] . "</td><td>" . $row["numero"] . "</td><td>" . $row["nome"] . "</td></tr>";
}

$dados .= "</table>";

//Cria retorno de dados com status.
$retorna = ['status' => true, 'dados' => $dados];

	} else {
		//Consulta não retornou nada.
		$retorna = ['status' => false, 'msg' => 'Turma não encontrada.'];
	}

//Transforma em json. O arquivo só pode ter um echo.
//O JS lerá esse echo	
echo json_encode($retorna);

//Fecha a conexão.	
	$conn->close();
	
?> 