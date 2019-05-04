<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<?php
session_start();
$login = @$_POST['login'];
$senha = @$_POST['senha'];

include "config.php";
include "classUsuario.php";
$usuario = new Usuario( DB_STRING, DB_USER, DB_PASS);

if( $usuario != "" && $senha != "" )
{
   if( $usuario->ConsultarPorEmail( $login ) )	
      {
	  // echo "Consultada:".$usuario->GetSenha()." Digitada:".md5( $senha);
		   if( $usuario->GetSenha() == md5( $senha) )
		   {
			   $_SESSION["username"] = $usuario->GetNome();
			   $_SESSION["userid"] = $usuario->GetUsuarioId();
			   echo "<h1>Usuário validado ! carregando o site...";
			   echo '<meta http-equiv="refresh" content="3;URL=./"/>';
		   }
		   else
		   {
			   echo "Senha incorreta !";
		   }
   
      }
	else
	{
		echo "Usuário não cadastrado !";
	}
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