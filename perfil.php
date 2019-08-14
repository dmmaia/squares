<?php session_start();
	include "conectar.php";

	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		
		if (isset($_GET['idPerfil'])) {
		$id = $_GET['idPerfil'];
		$email = mysqli_query($connect, "SELECT email from user where id = '$id'");
		while ($row = mysqli_fetch_object($email)) {
			$mail = $row->email;
		}

		if ($id != $_SESSION['id']) {
			echo "<style>a.apagar{display: none;}</style>";
		}


		$imgPerfil = $_SESSION['imgPerfil'];

	}else{
		header('location:entrar.php');
	}
  	}else{

		if (isset($_GET['idPerfil'])) {
			$id = $_GET['idPerfil'];
			$email = mysqli_query($connect, "SELECT email from user where id = '$id'");
			while ($row = mysqli_fetch_object($email)) {
				$mail = $row->email;
			}

			if ($id != $_SESSION['id']) {
				echo "<style>a.apagar{display: none;}</style>";
			}


			$imgPerfil = $_SESSION['imgPerfil'];

		} else {
			$id = $_SESSION['id'];
			$mail = $_SESSION['email'];
			$imgPerfil = $_SESSION['imgPerfil'];

			if (isset($_GET['DelPost'])) {
				$idpost = $_GET['DelPost'];
				$DeletePost = mysqli_query($connect, "DELETE FROM post WHERE idpost='$idpost'");
				header('location:perfil.php');
			}
		}
	}

	$name = mysqli_query($connect, "SELECT nome from user where email = '$mail'");
  	while($row2 = mysqli_fetch_object($name)){
  		$nome = $row2->nome;
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Squares</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<link rel="shortcut icon" href="img/Cube-icon.png" type="image/x-icon"/>
	<script type="text/javascript" src="js/javascript.js"></script>

</head>
<body>
	<div class="container">
		<div id="headMenu" >
			<a href="index.php" class="btn btn-primary">Feed</a>
		</div>
	</div>

	<div class="container">
		<div id = "contentPerfil">
			<div id="imgPerfil"><?php echo $imgPerfil; ?></div>
			<div id="nomeUser"><?php echo $nome; ?></div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php
					$post = mysqli_query($connect, "SELECT * from post where idautor = '$id' ORDER by data desc");
					$numbPost = mysqli_num_rows($post);

					if($numbPost){
						while ($row3 = mysqli_fetch_row($post)) {
							$conteudo = $row3[2];
							$idAutor = $row3[1];
							$data = $row3[3];
							$idPost = $row3[0];

							echo "<div class='post col-xs-12 col-sm-4 col-md-3'><p>".$conteudo."</p><div class='data'>".$data."</div><a  onclick='deletePost2(".$idPost.");' class='apagar'>Apagar</a></div>";
						}
					}else{
						echo "<div class='post'><div id='WC'>Você ainda não fez nenhuma postagem!</div></div>";
					}
				?>
		</div>		
	</div>
</body>
</html>