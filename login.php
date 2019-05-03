<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<?php
session_start();
$usuario = @$_POST['login'];
$senha = @$_POST['senha'];
	
if( $usuario == "marcio" && $senha == "123")	
	{
	$_SESSION["username"] = $usuario;
	echo "<h1>Usuário validado ! carregando o site...";
	echo '<meta http-equiv="refresh" content="3;URL=./"/>';
	}
else
	{
	
?>
<body>
	<h1>Login do sistema x</h1>
	<div id="login">
		<form action="" method="post" />
			<span>Login</span>
			<input type="text" name="login">
		
			<span>Senha</span>
			<input name="senha" type="password">
		     
			<input type="submit">
		</form>
	</div>
	</body>
	<?php
	}
	?>
</html>