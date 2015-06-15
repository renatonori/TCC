<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
		height: 40px;
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
	}
	boxTitle 
	{
		display:block;
		background-color:#ddd;
	    width: 350px;
	    height: 500px;
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
	    width: 350px;
	    height: 500px;
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
			<form METHOD="post" ACTION="" id = "bemvindo.php">
				<input id = "imageURL" type="text" name="imgUrl" placeholder = "Imagem URL">
				<input id = "nome" type="text" name="nome" placeholder = "Nome">
				<input id = "nomeCient" type="text" name="nomeCient" placeholder = "Nome Científico">
				<input id = "data" type="text" name="data" placeholder = "Data de plantio">
				<input id = "regiao" type="text" name="regiao"  placeholder = "Região de plantio">
				<input id = "info" type="text" name="info" placeholder = "Informações adicionais"><br>
				<input type="hidden" name="adicionar" value="true" />
				<button id="submitButton" type="submit">Adicionar</button>
			</form>
			<button type="button" onclick="hideAdicionar()">Cancelar</button>
		</boxTitle>
	</div>

	<div id = "editaRemoveCultura">
		<boxTitleRemove>
			<label id="titleAdicionar">Remover/Editar Cultura</label><br>
			<form METHOD="post" ACTION="" id = "bemvindo.php">
				<input id = "imageURLRemove" type="text" name="imgUrl" placeholder = "Imagem URL">
				<input id = "nomeRemove" type="text" name="nome" placeholder = "Nome">
				<input id = "nomeCientRemove" type="text" name="nomeCient" placeholder = "Nome Científico">
				<input id = "dataRemove" type="text" name="data" placeholder = "Data de plantio">
				<input id = "regiaoRemove" type="text" name="regiao"  placeholder = "Região de plantio">
				<input id = "infoRemove" type="text" name="info" placeholder = "Informações adicionais">
				<input id = "hiddenIndex" type="text">
				<br>
				<button id="deletar" name="deletar" type="submit" onClick="deletaOuRemove('1',hiddenIndex.value)">Deletar</button>
				<button id="editar" name="editar" type="submit" onClick="deletaOuRemove('2',hiddenIndex.value)">Editar</button>
			</form>
			<button type="button" onclick="hideRemoveEditaCultura()">Cancelar</button>
		</boxTitleRemove>
	</div>

	<div class="principal">
		<ul id="menu_top">
			<li><a href="./">Bem vindo:<?php echo($_POST['login']); ?></a></li>
		</ul>
		<button id = "logoutButton" type="button" onclick = ""><a href="./">Logout</a></button>
		<button id = "adicionarButton" type="button" onclick = "showAdicionar()">Adicionar</button>
	</div>