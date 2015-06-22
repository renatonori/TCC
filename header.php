<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
	include "funcoes.php";

	$refresh = false;
		if( $_SERVER['REQUEST_METHOD']=='POST' )
	{
		$request = md5( implode( $_POST ) );
		
		if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']== $request )
		{
			$refresh = true;
		}
		else
		{
			$_SESSION['last_request']  = $request;
			$refresh = false;
		}
	}
	if($refresh == false){
		$login = $_POST['login'];
		$senha = $_POST['senha'];

		$sql = "SELECT *
		FROM usuario
		WHERE usuario_login = '$login'
		AND usuario_password = '$senha'";

		$socket = conecta();
		if(!$socket)
		{
			desconecta($socket);
			header('location:index.php');

		}
		$resultado = mysql_query($sql,$socket);


		if (mysql_num_rows ($resultado) > 0) 
		{
	    // session_start inicia a sessão
	    session_start();
	    
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		desconecta($socket);

		}else{
			header('location:index.php');
			session_destroy();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="jquery-2.1.4.js" type="text/javascript"></script> 
	<script src="javascript.js" type="text/javascript"></script> 

	<title>Tcc</title>

	<style>
	body{
		background: #217AA2;
		margin: auto;
		font-family: "Verdana", Sans, serif;
	}
	.principal {
		height: 64px;
		margin-top: -16px;
		background: #31637D;
		margin-bottom: 30px;
	}
	a:link, a:visited, a:active {
		text-decoration:none;
	}

	.principal #menu_top {
		list-style-type: none;
	}

	.principal #menu_top li {
		float: left;  
	}

	.principal #menu_top li a {
		color: #fff;
		display: block;
		padding: 10px 20px 5px;
	}

	.principal #menu_top li a:hover {
		color: #ccc;
		list-style-type: none;
		text-decoration:none;
	}
		#logoutButton{
		margin: 10px;
		float: right;
		background-color: #fff;
		border:none;
		border-radius: 5px;
		font -color: #ffffff;
		padding: 4px;
		-webkit-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
	}
	#adicionarButton{
		margin: 10px;
		float: right;
		background-color: #fff;
		border:none;
		border-radius: 5px;
		font -color: #ffffff;
		padding: 4px;
		margin-right: 10px;
		-webkit-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
	}
	#adicionarCultura{
		position: fixed;
		display: none;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    z-index:99;
	    background-color: rgba(0,0,0,0.75);
	text-align: center ;
	}
	#editaRemoveCultura{
		position: fixed;
		display: none;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    z-index:99;
	    background-color: rgba(0,0,0,0.75);
	    text-align: center ;
	}
	boxTitle 
	{
		display:block;
		background-color:#ddd;
	    width: 300px;
	    height: 350px;
	    font-size: 12px;
	    border: none;
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    margin-right: -50%;
		-webkit-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
	    transform: translate(-50%, -50%)
	}
	#titleAdicionar{
		font-size: 20px;
		padding: 10px;
	} 
	boxTitleRemove
	{
		display:block;
		background-color:#ddd;
	    width: 300px;
	    height: 350px;
	    font-size: 12px;
	    border: none;
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    margin-right: -50%;
		-webkit-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 28px -2px rgba(0,0,0,0.75);
	    transform: translate(-50%, -50%)
	}
	#hiddenIndex{
		display:none;
	}
	</style>
</head>
<body>

	<div id = "adicionarCultura">
		<boxTitle>
			<label id="titleAdicionar">Adicionar Cultura</label><br>
			<form METHOD="post" ACTION="" id = "adicionarForm">
				<input class="btn btn-default" id = "imageURL" type="text" name="imgUrl" placeholder = "Imagem URL"><br>
				<input class="btn btn-default" id = "nome" type="text" name="nome" placeholder = "Nome"><br>
				<input class="btn btn-default" id = "nomeCient" type="text" name="nomeCient" placeholder = "Nome Científico"><br>
				<input class="btn btn-default" id = "data" type="text" name="data" placeholder = "Época de plantio"><br>
				<input class="btn btn-default" id = "regiao" type="text" name="regiao"  placeholder = "Região de plantio"><br>
				<input class="btn btn-default"  id = "info" type="text" name="info" placeholder = "Informações adicionais"><br><br>
				<button class="btn btn-primary" id="submitButton" type="submit">Adicionar</button>
				<button class="btn btn-danger" type="button" onclick="hideAdicionar()">Cancelar</button>
			</form>
		</boxTitle>
	</div>

	<div id = "editaRemoveCultura">
		<boxTitleRemove>
			<label id="titleAdicionar">Remover/Editar Cultura</label><br>
			<form METHOD="post" ACTION="" id = "removeEditaForm">
				<input class="btn btn-default" id = "imageURLRemove" type="text" name="imgUrl" placeholder = "Imagem URL">
				<input class="btn btn-default" id = "nomeRemove" type="text" name="nome" placeholder = "Nome">
				<input class="btn btn-default" id = "nomeCientRemove" type="text" name="nomeCient" placeholder = "Nome Científico">
				<input class="btn btn-default" id = "dataRemove" type="text" name="data" placeholder = "Época de plantio">
				<input class="btn btn-default" id = "regiaoRemove" type="text" name="regiao"  placeholder = "Região de plantio">
				<input class="btn btn-default" id = "infoRemove" type="text" name="info" placeholder = "Informações adicionais">
				<input class="btn btn-default" id = "hiddenIndex" name="index" type="text">
				<br><br>
				<button class="btn btn-primary" id="editar" name="editar" type="submit">Editar</button>
				<button class="btn btn-warning" type="button" id="deletar" name="deletar" onClick="deletaOuRemove('1',hiddenIndex.value)">Deletar</button>
				<button class="btn btn-danger" type="button" onclick="hideRemoveEditaCultura()">Cancelar</button>
			</form>
			
		</boxTitleRemove>
	</div>

	<div class="principal">
		<ul id="menu_top">
			<li><a href="./">Bem vindo:<?php echo($_SESSION['login']); ?></a></li>
		</ul>
		<button class="btn btn-danger" id = "logoutButton" type="button" onclick = ""><a href="./">Logout</a></button>
		<button id = "adicionarButton" type="button" onclick = "showAdicionar()">Adicionar</button>
	</div>