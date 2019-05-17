
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contate-nos <small>fique à vontade para nos contatar</small></h1>
            </div>
        </div>
    </div>
</div>
<?php

include "functions.php";
include "phpmailer\class.phpmailer.php";
$envio = false;


if( @$_POST['botao'] != '' )
   {
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $assunto = $_POST['assunto'];

     $mensagem = $_POST['mensagem'];

     if( $nome != "" && $email != "" && $assunto != "" && $mensagem != "" )
     {
       if( sendmail("marcio.nizzola@etec.sp.gov.br", "site@nizzola.com.br", "Site Nizzola", $assunto ,
        $mensagem,  "smtp.nizzola.com.br", "site@nizzola.com.br", "3tEc#itu#86", "", "", "" ) )
            {
                $envio = true;
            }
            else
            {
                echo "Erro no envio !";
            }
     }
     else
     {
         echo "Preencha todos os campos !";
     }
   }
else
   {
       $nome = "";
       $email = "";
       $mensagem = "";
   }

?>

<div class="container">
    
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
            <?php  
            if( ! $envio ) 
            {  ?>
                <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required="required" value="<?php echo $nome; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required="required" value="<?php echo $email; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Assunto</label>
                            <select id="assunto" name="assunto" class="form-control" required="required">
                                <option value="" selected="">Escolha um:</option>
                                <option value="orcamentos">Orçamentos</option>
                                <option value="duvidas">Dúvidas</option>
                                <option value="reclama">Reclamações</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensagem</label>
                            <textarea name="mensagem" id="mensagem" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Mensagem"><?php echo $mensagem; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="botao" class="btn btn-primary pull-right" id="botao" value="Enviar mensagem"/>>
                            
                    </div>
                </div>
                </form>
<?php  } 
    else 
       {  ?>
        <img src="emailenviado.png" />
        <h3>Aguarde entraremos em contato em breve !</h3>
<?php       }

?>
            </div>
        </div>


        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            
        </div>
    </div>
    </form>
</div>
