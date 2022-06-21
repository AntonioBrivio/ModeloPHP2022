<ul>
  <li><a href="principal.php">Principal</a></li>
   <li><a href="turmascontrolar.php">Turmas</a></li>
<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
    echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>Administração do Site</a>";
	echo "<div class='dropdown-content'><a href='usuariosrelatorio.php'>Relatório de Usuários</a><a href='usuarioscontrolar.php?pag=1'>Controlar Usuários</a><a href='usuariocadastrartela.php'>Cadastrar Usuário</a></div></li>";
}  
?>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn">Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content">
      <a href="usuarioeditarformcomum.php?id=<?php echo $_SESSION['id'] ?>">Alterar Dados</a>
      <a href="#">Alterar Senha</a>
      <a href="deslogar.php">Deslogar</a>
    </div>
  </li>
</ul>