//Apagar Post
var deletePost = function(Idpost){
 	var confim=confirm('Deseja apagar o post?');
 	 if(confim==true){
 	 	window.location.replace("index.php?DelPost="+Idpost+"");
 	 }
}
var deletePost2 = function(Idpost){
 	var confim=confirm('Deseja apagar o post?');
 	 if(confim==true){
 	 	window.location.replace("perfil.php?DelPost="+Idpost+"");
 	 }
}

//PreView Imagem
var loadFile = function(event) {
	var output = document.getElementById('output');
	output.src = URL.createObjectURL(event.target.files[0]);
};