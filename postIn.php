<?php session_start();
	include "conectar.php";

	$mail = $_SESSION['email'];
	$qId = mysqli_query($connect, "SELECT id from user where email = '$mail'");
  		while($row = mysqli_fetch_object($qId)){
  		$id = $row->id;
  	}

	if (isset($_POST["postIn"])) {
		$nPost = $_POST["postIn"];
		if ($nPost != "") {

			if (isset($_FILES['postImg'])) {
				$imagem = $_FILES['postImg']['tmp_name'];
				$tamanho = $_FILES['postImg']['size'];
				if ($imagem != "none") {
					$fp = fopen($imagem, "rb");
				      $conteudo = fread($fp, $tamanho);
				      $conteudo = addslashes($conteudo);
				      fclose($fp);
				      $tipo = $_FILES['postImg']['type'];
					  					  
				}
			
			      $postIn = mysqli_query($connect, "INSERT into post values(default, '$id', '$nPost',default,'$conteudo','$tipo')");
					echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
			}else{
				$postIn = mysqli_query($connect, "INSERT into post values(default, '$id', '$nPost',default,default,default)");
				echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
			}
		}
		else{
			header('location:index.php');
		}
	}
 ?>