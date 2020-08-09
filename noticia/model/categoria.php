<?php
class Categoria 
{
	//atributos da classe
	private $codcategoria;
	private $nomecategoria;

	//métodos de acesso GET/SET
	function __get($atributo){
		return $this->$atributo;
	}

	function __set($atributo,$novovalor){
		$this->$atributo = $novovalor;
	}

	//acessando classe de conexão
	private $con; //acesso da conexão
	function __construct()
	{
		include_once("conexao.php");
		$classe_con = new Conexao();
		$this->con = $classe_con->Conectar();
	}

	//método para cadastrar
	function Cadastrar()
	{
		$comandoSQL = "insert into categoria (nomecategoria) values (?)";
		$valores = array($this->nomecategoria);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
	}

	//método para consultar
	function Consultar()
	{
		$comandoSQL = "select * from categoria";
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute();
		$dados = array();//matriz para trazer dados do BD
		//laço para preencher matriz
		foreach ($exec->fetchAll() as $value) {
			
			$cat = new Categoria();
			$cat->codcategoria 	= $value["codcategoria"];
			$cat->nomecategoria = $value["nomecategoria"];

			$dados[] = $cat; //carregando item
		}

		return $dados; //retorno da matriz preenchida
	}

	//método excluir
	function Excluir()
	{
		$comandoSQL = "delete from categoria where codcategoria = ?";
		$valores = array($this->codcategoria);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		try
		{
			//executando o comando SQL enviando valores
			$exec->execute($valores);
			return true;
		}
		catch(Exception $ex)
		{
			return false;
		}
	}

	//método atualizar
	function Atualizar()
	{
		$comandoSQL = "update categoria set
							nomecategoria		= ?
							where codcategoria = ?";
		$valores = array($this->nomecategoria,
						 $this->codcategoria);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
	}

	//método para retornar os dados de 1 usuário
	function RetornarDados()
	{
		$comandoSQL = "select * from categoria
		where codcategoria = ?";
		$valores = array($this->codcategoria);//valores
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		$exec->execute($valores); //executar
		$value = $exec->fetch(); //transformar em matriz
		//preencher objeto Usuario
		$cat = new Categoria();
		$cat->codcategoria 			= $value["codcategoria"];
		$cat->nomecategoria 		= $value["nomecategoria"];

		return $cat; //retorno da matriz preenchida
	}


}
?>