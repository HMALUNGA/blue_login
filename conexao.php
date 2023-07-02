<?php
$servername="localhost";
$username="root";
$password="";
$db="blue_login";

$conexao=mysqli_connect($servername,$username,$password,$db);

if(mysqli_connect_error()):
	echo "Erro de conexão: ".mysqli_connect_error();
endif;



?>