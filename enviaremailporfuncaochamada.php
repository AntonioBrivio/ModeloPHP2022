<?php

//Código normal do seu projeto. Daí, precisamos enviar um email.

//Código reutilizável para enviar emails.
require 'enviaremailporfuncaocodigo.php';

//Chamada da função no do código
enviaremail('Nome', 'Email@dominio.com', 'Um assunto', 'Um texto');

?>