<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de usuário</title>
</head>
<body>
	<h1>Listagem de usuários</h1>
	
	Listando um total de:
	<?php
	include "config.php";
	include "classUsuario.php";

	$usuario = new Usuario( DB_STRING, DB_USER, DB_PASS);
	$quant = $usuario->Contar();
	echo $quant;
	?> usuários<br>

	<table border="1">
		<tr>
			<td>Código</td>
			<td>Nome</td>
			<td>Ações</td>
		</tr>
<?php 
$pag = @$_GET['pag'];
if( $pag == "")		
	$pag = 1;
		
$limite = 20;
$inicio = ( ($pag-1) * $limite) ;	
$paginas = ceil($quant / $limite );		

$excluir = @$_GET['excluir'];
if( $excluir != "" )		
{
	$usuario->Excluir($excluir);
	echo "Usuário ".$excluir." Excluído com sucesso!";
}
		
// chama o método listar da classe
$result = $usuario->ListarPag($inicio, $limite);

  // atraves do If checa se houve um retorno válido   
  if (isset($result))
  {
    while ($user = $result->fetchObject())
    {   ?>
		<tr>
			<td><?php echo $user->usuarioId; ?></td>
			<td><?php echo $user->nome; ?></td>
			<td><a href='./?menu=usuario.editar&id=<?php echo $user->usuarioId; ?>'>Editar</a>
				<a href='./lista.usuario.php?excluir=<?php echo $user->usuarioId; ?>'>Excluir</a>
			</td>
		</tr>
		<?php
	 /*
	 echo "<tr><td>".$user->usuarioId."</td>
	 			<td>".$user->nome."</td>
				<td> <a href='usuario.editar.php?id=$user->usuarioId'>Editar</a></td></tr>";
	 
	 	*/
    }
  }
  else
  {
      echo "<tr><td colspan='3'>Não há dados para listar!</td></tr>";
  }
?>
	</table>
	<a href="usuario.incluir.php">Novo Usuário</a>
</body>
	
<div id="paginacao">
  <?php
	for( $i = 1; $i <= $paginas; $i++ )
	{
		echo "<span class='paginacao'><a href='./lista.usuario.php?pag=$i'>$i</a></span> ";
	}

   ?>
	
</div>	
	
	
	