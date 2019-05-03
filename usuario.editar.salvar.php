<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php 
include "config.php";
include "classUsuario.php";

$usuario = new Usuario( DB_STRING, DB_USER, DB_PASS);

$usuario->SetUsuarioId( $_POST["codigo"]);
$usuario->SetNome($_POST["nome"]);
$usuario->SetEmail($_POST["email"]);
$usuario->SetSenha($_POST["senha"]);

if ($usuario->ValidarCampos())
{
    $usuario->Alterar();
}

?>

<table>
        <th>Informações do usuário</th>
            <tr>
                <td>Nome: </td>
                <td><?php echo $usuario->GetNome() ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?php echo $usuario->GetEmail() ?></td>
            </tr>
            <tr>
                <td>Senha: </td>
                <td><?php echo $usuario->GetSenha() ?></td>
            </tr>
    </table>
    
</body>
</html>