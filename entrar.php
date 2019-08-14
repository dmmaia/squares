<?php session_start(); 
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
	{}else{header('location:index.php');}
?>

<!DOCTYPE html>
<html>
<head>
		<title>Squares-Entrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/entrar.css">
	<link rel="shortcut icon" href="img/Cube-icon.png" type="image/x-icon"/>

</head>
<body>
	<div id="interface">
		<div id="cadastro" class="features col-xs-12 col-sm-6 col-md-6">
			<form action="cadastro.php" method="post">
				<h1>Cadastro</h1>
				<spam>E-mail:</spam><br>
				<input type="text" name="email_cadastro"><br><br>
				<span>Como quer ser Chamado?:</span><br>
				<input type="text" name="nick_cadastro"><br><br>
				<span>Senha:</span><br>
				<input type="password" name="senha_cadastro"><br><br>
				<input type="submit" value="Cadastrar" class="botao btn btn-primary">
			</form>
		</div>
		<div id="login" class="features col-xs-12 col-sm-6 col-md-6">
			<form action="check.php" method="post">
				<h1>Login</h1>
				<span>E-mail:</span><br>
				<input type="text" name="email"><br><br>
				<span>Senha:</span><br>
				<input type="password" name="senha"><br><br>
				<input type="submit" value="Entrar" class="botao btn btn-primary">
			</form>
		</div>
	</div>
</body>
</html>