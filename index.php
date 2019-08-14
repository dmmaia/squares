<?php session_start();
	include "conectar.php";
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('location:entrar.php');
  	}
  	$mail = $_SESSION['email'];
  	$name = mysqli_query($connect, "SELECT nome from user where email = '$mail'");
  	while($row = mysqli_fetch_object($name)){
  		$nome = $row->nome;
  	}
  	$qId = mysqli_query($connect, "SELECT id from user where email = '$mail'");
  	while($row2 = mysqli_fetch_object($qId)){
  	$id = $row2->id;
  	}

	$_SESSION['nome'] = $nome;
	$_SESSION['imgPerfil'] = "<img src='img/Default-perfil.png''>";
	$_SESSION['id'] = $id;

	if (isset($_GET['DelPost'])) {
		$idpost = $_GET['DelPost'];
		$DeletePost = mysqli_query($connect, "DELETE FROM post WHERE idpost='$idpost'");
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Squares</title>
		<meta name= "viewport" content= "width=device-width">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/geral.css"/>
		<link rel="shortcut icon" href="img/Cube-icon.png" type="image/x-icon"/>
		<script type="text/javascript" src="js/javascript.js"></script>
		<?php 
			echo "<script></script>";
		?>
<body>
	
	<?php
		include "conectar.php";
	?>

	<div class="container">
		<div class="row">
			<div class="info-square  col-sm-6 col-md-3">
				<div id="imgPerfil"><?php echo $_SESSION['imgPerfil']; ?></div>
				<div id="nomeUser"><a href="perfil.php"><?php echo $_SESSION['nome']; ?></a></div>
			</div>

			<div class="feed col-xs-12 col-sm-12 col-md-6">
				<form enctype="multipart/form-data" action="postIn.php" method="post">
					<textarea id="postIn" maxlength="300" placeholder="Compartilhe uma ideia!" name="postIn"></textarea>
					<img id="output" style="width: 250px;"/>
					<!--<input type="file" accept="image/*" name="postImg" onchange="loadFile(event)">-->
					<input type="submit" value="Post!" class="btn btn-primary">
				</form>
				<br>
				<br>
				
				<?php
					$post = mysqli_query($connect, "SELECT * from post where idautor = '$id' ORDER by data desc");
					$numbPost = mysqli_num_rows($post);

					if($numbPost){
						while ($row3 = mysqli_fetch_row($post)) {
							$conteudo = $row3[2];
							$idAutor = $row3[1];
							$data = $row3[3];
							$idPost = $row3[0];
							$imagem = $row3[4];
							$tipo = $row3[5];

							
							$autor = mysqli_query($connect, "SELECT nome from user where id = '$idAutor'");
							while($row4 = mysqli_fetch_object($autor)){
	  							$autorPost = $row4->nome;
	  						}

							echo "<div class='post'><h4><a href='perfil.php?idPerfil=".$idAutor."'>".$autorPost."</a></h4><p>".$conteudo."</p><div class='data'>".$data."</div><a  onclick='deletePost(".$idPost.");' class='apagar'>Apagar</a></div>";
						}
					}else{
						echo "<div class='post'><div id='WC'>Você ainda não segue nenhum perfil e não fez nenhuma postagem!</div></div>";
					}
				?>
			</div>
</body>
</html>

<?php 
 
?>