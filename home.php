<?php
require_once 'conexao.php';
session_start();
require_once 'head.php';

if(!isset($_SESSION['logado'])):
header('Location:login.php');
endif;
?>
<nav>

	<ul>
		<li>Logotipo do site</li>
	    <li><p><?php echo $_SESSION['id_session'];?></p></li>
	</ul>
	<a href="processar_logout.php">Logout</a>
</nav>

<?php 
require_once 'footer.php';
 ?>