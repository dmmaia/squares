<?php session_start();
	include "conectar.php";
	
	if ( ($_POST["email"]) != "" and ($_POST["senha"])!=""){
		$email = $_POST["email"];
		$senha = $_POST["senha"];
	}else{
		echo "<script>alert('Preencha todos os campos!')</script>";
		echo '<meta http-equiv="refresh" content="0; url=entrar.php"/>';
	}

	$verific = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' and pass='$pass'");
	$linhas = mysqli_num_rows($verific);

	if ($verific) {
		$_SESSION["email"] = $email;
		$_SESSION["senha"] = $senha;
		header('location:index.php');
	} else {
		unset ($_SESSION['email']);
 		unset ($_SESSION['senha']);
		echo "<script>alert('Senha e/ou email incorreto(s)!')</script>";
		echo '<meta http-equiv="refresh" content="0; url=entrar.php"/>';

	}
	

?>