<?php
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'acesso');

echo "<br>" . $camponome;
echo "<br>" . $campoemail;
echo "<br>" . $campoacesso;

?>