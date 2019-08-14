<?php 
	include "conectar.php";

	if (($_POST["email_cadastro"])!="" and  ($_POST["nick_cadastro"])!="" and ($_POST["senha_cadastro"])!="") {
		$cadEmail = $_POST["email_cadastro"];
		$cadNick = $_POST["nick_cadastro"];
		$cadPass = $_POST["senha_cadastro"];
	}else {
		header('location:entrar.php');
	}


	$verific = mysqli_query($connect,"SELECT * FROM user WHERE email='$cadEmail'");
	$linhas = mysqli_num_rows($verific);

	if($linhas){
	echo "<script>alert('Este e-mail já esta sendo usado!')</script>";
	echo '<meta http-equiv="refresh" content="0; url=entrar.php"/>';
	}else{
	$cadastro = mysqli_query($connect,"INSERT INTO user VALUES(default, '$cadNick','$cadEmail','$cadPass')");
	echo "<script>alert('Cadastro feito com sucesso!')</script>";
	echo '<meta http-equiv="refresh" content="0; url=entrar.php"/>';
	}
 ?>