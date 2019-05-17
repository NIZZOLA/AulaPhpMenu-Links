<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


<link type="text/css" href="style.css"	media="all" rel="stylesheet"/>
</head>

<body>
	
	<nav class="nav-bar">
		<div class="nav-container"> 
			<a id="nav-menu" class="nav-menu">☰ Menu</a>
			<ul class="nav-list " id="nav">
				<!--
				<li> <a href="#" id="tile1"><i class="icon ion-ios7-home-outline"></i> Home</a></li>
				<li> <a href="#" id="tile2"><i class="icon ion-ios7-person-outline"></i> About</a></li>
				<li> <a href="#" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i> Portfolio</a></li>
				<li> <a href="#" id="tile4"><i class="ion-ios7-monitor-outline"></i> Services</a></li>
				<li> <a href="#" id="tile5"><i class="ion-ios7-people-outline"></i> Clients</a></li>
				<li> <a href="#" id="tile6"><i class="ion-bag"></i> Order</a></li>
				<li> <a href="#" id="tile7"><i class="ion-ios7-paper-outline"></i> Blog</a></li>
				<li> <a href="#" id="tile8"><i class="ion-ios7-email-outline"></i> Contact</a></li>
				-->
				<li> <a href="./" id="tile1"><i class="icon ion-ios7-home-outline"></i> Home</a></li>
				<li> <a href="./?menu=produtos" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i> Produtos</a></li>
				<li> <a href="./?menu=usuarios" id="tile5"><i class="ion-ios7-people-outline"></i> Users</a></li>
				<li> <a href="./?menu=contato" id="tile8"><i class="ion-ios7-email-outline"></i> Contact</a></li>
				<li> <a href="./?menu=logout" id="tile7"><i class="ion-ios7-paper-outline"></i> Logout</a></li>
			</ul>
		</div>
	</nav>
	
	<div id="conteudo">
	
		<?php
		session_start();
		if(!isset( $_SESSION['username'] ))
		{
			?>  
			<meta http-equiv="refresh" content="0;URL=./login.php"/>
			<?php
		}

		echo "Bem vindo ".$_SESSION["username"]."<br>";
		// obtém a variável menu caso um link tenha sido clicado
		$opcao = @$_GET['menu'];
		
		//echo $opcao;
		switch($opcao)
		{
			case "":
				echo "Tela principal";
				break;
			case "produtos":
				include "produtos.php";
				break;
			case "usuarios":
				include "lista.usuario.php";
				break;
			case "contato":
				include "contato.php";
				break;
				
			case "usuario.editar":
				include "usuario.editar.php";
				break;
			case "salvarusuario":
				include "usuario.editar.salvar.php";
				break;
			case "logout":
				unset($_SESSION['username']);
				echo '<meta http-equiv="refresh" content="0;URL=./login.php"/>';
				break;
		}
		
		
		?>
		
	
	</div>
	
</body>
</html>
<script>
	$(document).ready(function(){
	$('#nav-menu').click(function(){
		$('ul.nav-list').addClass('open').slideToggle('200');
	});
});
</script>
