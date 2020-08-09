<?php
class Noticia 
{
	//atributos da classe
	private $codnoticia;
	private $titulo;
	private $autor;
	private $data;
	private $conteudo;
	private $imagem;
	private $codcategoria;

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
		$comandoSQL = "insert into noticia (titulo,autor,data,conteudo,imagem,codcategoria) values (?, ?, ?,?,?,?)";
		$valores = array($this->titulo,
						 $this->autor,
						 $this->data,
						 $this->conteudo,
						 $this->imagem,
						 $this->codcategoria);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
	}

	//método para consultar
	function Consultar()
	{
		$comandoSQL = "select codnoticia, titulo, autor, data, conteudo, imagem, nomecategoria from noticia 
		join categoria on noticia.codcategoria = categoria.codcategoria";
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute();
		$dados = array();//matriz para trazer dados do BD
		//laço para preencher matriz
		foreach ($exec->fetchAll() as $value) {		
			$not = new Noticia();
			$not->codcategoria 	= $value["nomecategoria"];//aqui
			$not->titulo 		 	= $value["titulo"];
			$not->autor 	= $value["autor"];	
			$not->data			= $value["data"];
			$not->conteudo			= $value["conteudo"];
			$not->imagem			= $value["imagem"];
			$not->codnoticia			= $value["codnoticia"];
			$dados[] = $not; //carregando item
		}
		return $dados; //retorno da matriz preenchida
	}

	//método excluir
	function Excluir()
	{
		$comandoSQL = "delete from noticia where codnoticia = ?";
		$valores = array($this->codnoticia);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
	}

	//método atualizar
	function Atualizar()
	{
		$comandoSQL = "update noticia set
							titulo			= ?,
							autor			= ?,
							data			= ?,
							conteudo		= ?,
							imagem			= ?,
							codcategoria	= ?
							where codnoticia = ?";
		$valores = array($this->titulo,
						 $this->autor,
						 $this->data,
						 $this->conteudo,
						 $this->imagem,
						 $this->codcategoria,
						 $this->codnoticia);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
	}

	//método para retornar os dados de 1 noticia
	function RetornarDados()
	{
		$comandoSQL = "select * from noticia
		where codnoticia = ?";
		$valores = array($this->codnoticia);//valores
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		$exec->execute($valores); //executar
		$value = $exec->fetch(); //transformar em matriz
		//preencher objeto Usuario
		$not = new Noticia();
		$not->codcategoria 	= $value["codcategoria"];
		$not->titulo 		= $value["titulo"];
		$not->autor 		= $value["autor"];	
		$not->data			= $value["data"];
		$not->conteudo		= $value["conteudo"];
		$not->imagem		= $value["imagem"];
		$not->codnoticia	= $value["codnoticia"];
		return $not; //retorno da matriz preenchida
	}


//método para consultar por categoria
	function ConsultarPorCategoria()
	{
		$comandoSQL = "select codnoticia, titulo, autor, data, conteudo, imagem, nomecategoria from noticia 
		join categoria on noticia.codcategoria = categoria.codcategoria where noticia.codcategoria = ?";
		$valores = array($this->codcategoria);
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute($valores);
		$dados = array();//matriz para trazer dados do BD
		//laço para preencher matriz
		foreach ($exec->fetchAll() as $value) {		
			$not = new Noticia();
			$not->codcategoria 	= $value["nomecategoria"];//aqui
			$not->titulo 		 	= $value["titulo"];
			$not->autor 	= $value["autor"];	
			$not->data			= $value["data"];
			$not->conteudo			= $value["conteudo"];
			$not->imagem			= $value["imagem"];
			$not->codnoticia			= $value["codnoticia"];
			$dados[] = $not; //carregando item
		}
		return $dados; //retorno da matriz preenchida
	}

		//método para consultar
	function ConsultarLimit($inicio, $qtd_pagina,$codcategoria)
	{
		if($codcategoria == "")
		{
		$comandoSQL = "select codnoticia, titulo, autor, data, conteudo, imagem, nomecategoria from noticia 
		join categoria on noticia.codcategoria = categoria.codcategoria 
		limit $inicio, $qtd_pagina";
		}
		else
		{
			$comandoSQL = "select codnoticia, titulo, autor, data, conteudo, imagem, nomecategoria from noticia 
		join categoria on noticia.codcategoria = categoria.codcategoria 
		where noticia.codcategoria = $codcategoria
		limit $inicio, $qtd_pagina";
		}
		//preparando o comando SQL
		$exec = $this->con->prepare($comandoSQL);
		//executando o comando SQL enviando valores
		$exec->execute();
		$dados = array();//matriz para trazer dados do BD
		//laço para preencher matriz
		foreach ($exec->fetchAll() as $value) {		
			$not = new Noticia();
			$not->codcategoria 	= $value["nomecategoria"];//aqui
			$not->titulo 		 	= $value["titulo"];
			$not->autor 	= $value["autor"];	
			$not->data			= $value["data"];
			$not->conteudo			= $value["conteudo"];
			$not->imagem			= $value["imagem"];
			$not->codnoticia			= $value["codnoticia"];
			$dados[] = $not; //carregando item
		}
		return $dados; //retorno da matriz preenchida
	}

}
?>