<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
  </head>
  <body>
    <form action="usuario.gravar.php" method="POST">
      <table>
        <th>Incluir Usuário</th>
        <tr>
          <td><label>Nome: </label></td>
          <td><input type="text" name="nome" /></td>
        </tr>
        <tr>
          <td><label>Email: </label></td>
          <td><input type="email" name="email" /></td>
        </tr>
        <tr>
          <td><label>Senha: </label></td>
          <td><input type="password" name="senha" /></td>
        </tr>
        <tr><td><input type="submit" value="Salvar"></td></tr>
      </table>
    </form>
<?php 

   // include "usuario.gravar.php";
?>
  </body>
</html>
