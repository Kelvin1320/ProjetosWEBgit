<?php
var_dump($_GET);

echo "<hr>";

if (isset($_GET['url'])) {
	$url = explode("/", $_GET['url']);
	$pagina = "view/$url[0].php";

	if (isset($url[1])) {
		$id = $url[1];
	

	}

	if (is_file($pagina)) {
		include_once($pagina);
	}else{
		include_once("view/erro.php");
	}

	include_once($pagina);
}else{
	include_once("login.php");
}



?>