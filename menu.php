<ul>
  <li><a href="principal.php">Principal</a></li>
  <li><a href="turmascontrolar.php">Turmas</a></li>
  <li><a href="turmascontrolarjoin.php">Turmas Join</a></li>
  <li><a href="turmascontrolarjs.php">Turmas Controle JS e PDF</a></li>
  <li><a href="eventoscontrolar.html">Eventos</a></li>
<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
    echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>Administração do Site</a>";
	echo "<div class='dropdown-content'><a href='usuariosrelatorio.php'>Relatório de Usuários</a><a href='usuariosrelatoriojs.php'>Gráfico Controle JS</a><a href='usuarioscontrolar.php?pag=1'>Controlar Usuários</a><a href='usuariocadastrartela.php'>Cadastrar Usuário</a></div></li>";
}  
?>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn">Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content">
      <a href="usuarioeditarformcomum.php">Alterar Dados</a>
      <a href="#">Alterar Senha</a>
      <a href="mensagemcadastrartela.php">Mensagens</a>
      <a href="deslogar.php">Deslogar</a>
    </div>
  </li>
</ul>