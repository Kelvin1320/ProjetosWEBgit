<?php
class Usuario implements JsonSerializable//nome da classe
{
	//atributo da classe
	private $nome;
	private $email;
	private $senha;
	private $nivel_acesso;
	private $codusuario;

	//função para gerar Json
	function jsonSerialize()
    {
        return 
        [
            'nome'   => $this->nome,
			'email' => $this->email,
			'nivel_acesso' => $this->nivel_acesso,
			'codusuario' => $this->codusuario
        ];
    }

	//métodos get e set
	function __get($atributo)
	{
		return $this->$atributo;
	}

	function __set($atributo, $value)
	{
		$this->$atributo = $value;
	}

	//acessando a conexão
	private $con;
	function __construct()
	{
		include_once("conexao.php");
		$classe_con = new Conexao();
		$this->con = $classe_con->Conectar();
	}

	//método cadastrar
	function Cadastrar()
	{
		$comandoSQL = "insert into usuario 
		(nome,email, senha, nivel_acesso)
		values (?,?,?,?)";
		$valores = array($this->nome,
						 $this->email,
						 sha1($this->senha),
						 $this->nivel_acesso);
		$exec = $this->con->prepare($comandoSQL);
		$exec->execute($valores);
	}

	//método consultar
	function Consultar()
	{
		$comandoSQL = "select * from usuario";
		$exec = $this->con->prepare($comandoSQL);
		$exec->execute();
		//criar o vetor para os dados
		$dados = array();
		//laço de repetição para armazenar dados no vetor
		foreach ($exec->fetchAll() as $value)
		{
			$usu = new Usuario();
			$usu->nome 			= $value["nome"];
			$usu->email 		= $value["email"];
			$usu->senha 		= $value["senha"];
			$usu->nivel_acesso 	= $value["nivel_acesso"];
			$usu->codusuario	= $value["codusuario"];

			$dados[] = $usu;//armazenando no vetor
		}

		return $dados;//retornando vetor preenchido
	}
	//método excluir
	function Excluir()
	{
		$comandoSQL = "delete from usuario where codusuario = ?";
		$valores = array($this->codusuario);
		$exec = $this->con->prepare($comandoSQL);
		$exec->execute($valores);
	}

	//método atualizar
	function Atualizar()
	{
		$comandoSQL = "update usuario set 
				nome		 = ?,
				email 		 = ?,
				senha 		 = ?,
				nivel_acesso = ?
		where codusuario = ?";
		$valores = array($this->nome,
						 $this->email,
						 sha1($this->senha),
						 $this->nivel_acesso,
						 $this->codusuario);

		$exec = $this->con->prepare($comandoSQL);
		$exec->execute($valores);
	}

	//método para retornar os dados 
	function RetornarDados()
	{
		$comandoSQL = "select * from usuario
		where codusuario = ?";//comando SQL
		$valores = array($this->codusuario);//valor do parâmetro (?)	
		$exec = $this->con->prepare($comandoSQL);//prepara comando
		$exec->execute($valores);//executa comando

		$value = $exec->fetch();//vetor
		$usu = new Usuario();//objeto da classe Usuario
		$usu->nome 			= $value["nome"];//preenche nome
		$usu->email 		= $value["email"];//preenche email
		$usu->senha 		= $value["senha"];//preenche senha
		$usu->nivel_acesso 	= $value["nivel_acesso"];//preence nivel
		$usu->codusuario	= $value["codusuario"];//preenche codigo

		return $usu;//retornando objeto preenchido
	}


	//método para logar
	function Logar()
	{
		$comandoSQL = "select * from usuario
		where email = ? and senha = ?";//comando SQL

		$valores = array($this->email, sha1($this->senha));//valor do parâmetro (?)	
		$exec = $this->con->prepare($comandoSQL);//prepara comando
		$exec->execute($valores);//executa comando

		$value = $exec->fetch();//vetor
		$usu = new Usuario();//objeto da classe Usuario
		if(!empty($value["codusuario"]))
		{
			$usu->nome 			= $value["nome"];//preenche nome
			$usu->email 		= $value["email"];//preenche email
			$usu->senha 		= $value["senha"];//preenche senha
			$usu->nivel_acesso 	= $value["nivel_acesso"];//preence nivel
			$usu->codusuario	= $value["codusuario"];//preenche codigo
		}
		return $usu;//retornando objeto preenchido
	}

}
?>