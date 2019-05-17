<?php 
// extends PDO para conectar com banco de dados
class Usuario extends PDO
{
    private $UsuarioId, $Nome, $Senha, $Email, $DataCadastro;

    public function GetUsuarioId(){
        return $this->UsuarioId;
    }

    public function SetUsuarioId($value){
        $this->UsuarioId = $value;
    }
    
    public function GetNome(){
        return $this->Nome;
    }

    public function SetNome($value){
        $this->Nome = $value;
    }

    public function GetSenha(){
        return $this->Senha;
    }

    public function SetSenha($value){
        $this->Senha = $value;
    }

    public function GetEmail(){
        return $this->Email;
    }

    public function SetEmail($value){
        $this->Email = $value;
    }

    public function ValidarCampos(){

        $retorno = true;
        if ($this->Nome == "") {
            echo "O campo nome é obrigatório";
            $retorno = false;
        }
        
        if ($this->Senha == "") {
            echo "O campo senha é obrigatório";
            $retorno = false;
        }
        
        if ($this->Email == "") {
            echo "O campo email é obrigatório";
            $retorno = false;
        }
        return $retorno;
    }

    public function Incluir()
    {
        $data = [
            'nome' => $this->GetNome(),
            'email' => $this->GetEmail(),
            'senha' => md5( $this->GetSenha() ),
        ];
        
        $sql = "INSERT INTO usuario ( nome, email, senha) VALUES (:nome , :email, :senha )";
        // Preparação da instrução 
        $stmt= $this->prepare($sql);
        $resp = $stmt->execute($data);
        return $resp;
    }

    public function Alterar()
    {
        $data = [
            'usuarioId' => $this->GetUsuarioId(),
            'nome' => $this->GetNome(),
            'email' => $this->GetEmail(),
            'senha' => $this->GetSenha(),
        ];
        
        $sql = "UPDATE usuario SET nome=:nome, email=:email,senha=:senha WHERE usuarioId=:usuarioId";
        // Preparação da instrução 
        $stmt= $this->prepare($sql);
        $stmt->execute($data);
    }
    public function Excluir($id )
    {
        $sql = "DELETE FROM `usuario` WHERE usuarioId=".$id;
        $this->query($sql);
    }
    
	public function Consultar( $id )
    {
        $sql = "SELECT * FROM usuario where usuarioid=".$id;
        if($base = $this->query($sql)){
 
            while($row = $base->fetchObject())
                {
                 $this->SetUsuarioId( $row->usuarioId );
                 $this->SetNome( $row->nome );
                 $this->SetEmail( $row->email );
                 $this->SetSenha( $row->senha );
                 
               return true;
            }
         }
         return false;
    }
	
	public function ConsultarPorEmail( $email )
	{
		$sql = "SELECT * FROM usuario where email='$email'";
		
		//echo $sql;
        if($base = $this->query($sql)){
 
            while($row = $base->fetchObject())
                {
                 $this->SetUsuarioId( $row->usuarioId );
                 $this->SetNome( $row->nome );
                 $this->SetEmail( $row->email );
                 $this->SetSenha( $row->senha );
                 
               return true;
            }
         }
         return false;
	}
	
	public function Contar()
	{
		$resp = $this->prepare("SELECT count(*) as totalreg FROM `usuario` ");
		$resp->execute();
		$total = $resp->fetch(PDO::FETCH_OBJ);
		return $total->totalreg;
	}

    public function Listar()
    {
        return $this->query( "select * from usuario order by nome");
    }
	
	public function ListarPag($inicio , $quant )
    {
        return $this->query( "select * from usuario order by nome limit $inicio,$quant ");
    }
}
?>