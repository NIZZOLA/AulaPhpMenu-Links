<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
  </head>
  <body>
  <?php
    include "config.php";
    include "classUsuario.php";
    
    $id = @$_GET['id'];
    if($id == "" )
    {
        echo "Não é possível editar um usuário sem o ID !";
    }
    else
    {
    
    $usuario = new Usuario( DB_STRING, DB_USER, DB_PASS);
    if( $usuario->Consultar( $id ) )
      {
        ?>
        <form action="./?menu=salvarusuario" method="POST">
          <table>
            <th>Alterar Usuário</th>
            <tr>
              <td><label>Código: </label></td>
              <td><input type="text" name="codigo" value="<?php echo $usuario->getUsuarioId();  ?>" /></td>
            </tr>
            <tr>
              <td><label>Nome: </label></td>
              <td><input type="text" name="nome" value="<?php echo $usuario->getNome(); ?>" /></td>
            </tr>
            <tr>
              <td><label>Email: </label></td>
              <td><input type="email" name="email" value="<?php echo $usuario->getEmail(); ?>" /></td>
            </tr>
            <tr>
              <td><label>Senha: </label></td>
              <td><input type="password" name="senha" value="<?php echo $usuario->getSenha(); ?>" /></td>
            </tr>
            <tr><td><input type="submit" value="Salvar"></td></tr>
          </table>
        </form>
      <?php 
       }
       else
       {
           echo "Código inválido !";
       }

    }
?>
  </body>
</html>
