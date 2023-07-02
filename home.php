<?php
require_once 'conexao.php';
session_start();
require_once 'head.php';

if(!isset($_SESSION['logado'])):
header('Location:login.php');
endif;

$id=$_SESSION['id_session'];
$sql="SELECT * FROM users WHERE id='$id'";
$resultado=mysqli_query($conexao,$sql);
$dados=mysqli_fetch_array($resultado);




?>
<nav>

	<ul>
		<li>Logotipo do site</li>
	    <li><p><?php echo $dados['user'];?></p></li>
	</ul>
	<a href="processar_logout.php">Logout</a>
</nav>

<?php 
require_once 'footer.php';
 ?>