<?php
session_start();
require_once 'head.php';
require_once 'conexao.php';

if(isset($_POST['logar'])):
	$erros=array();
 $user=mysqli_escape_string($conexao,$_POST['user']);
 $senha=mysqli_escape_string($conexao,$_POST['password']);
 if(empty($user) || empty($senha)):
 	$erros[]="O campo user e ou senha estão vazios";
else:
	$sql="SELECT user FROM users WHERE user='$user'";
	$resultado=mysqli_query($conexao,$sql);
	if(mysqli_num_rows($resultado)>0):
		$senha=md5($senha);
		$sql="SELECT * FROM users WHERE user='$user' && password='$senha'";
		$resultado=mysqli_query($conexao,$sql);
		if(mysqli_num_rows($resultado)==1):
			$dados=mysqli_fetch_array($resultado);
			$_SESSION['logado']=true;
			$_SESSION['id_session']=$dados['id'];
		 header('Location: home.php');

		else:
			$erros[]="A senha e o usuario não conferem.";
		endif;
	else:
		$erros[]="o usuario nao existe";
	endif;
endif;




 endif;

  
?>
<header>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    		<input type="text" name="user" placeholder="Username" class="user">
    		<input type="password" name="password" placeholder="Password" class="pass">
    		<button name="logar">LOGIN</button>
    		<p><a href="" class="clica_aqui">Forgot you password?</a></p>
	    </form>
	    <p class="cor"><?php
           if(!empty($erros)):
           	foreach($erros as $valor):
           		echo "<li>$valor</li>";
           	endforeach;
           endif;?>
		</p>
</header>

<?php
require_once 'footer.php';
?>

