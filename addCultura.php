<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
	$index = $_POST['index'];

	$banco = "control_tccnori";
	$usuario = "control_nori";
	$senha = "Zaq12wsX";
	$hostname = "72.249.76.79";
	$conexao = mysql_connect($hostname, $usuario, $senha);

	mysql_select_db($banco) or die( "Não foi possível conectar ao banco de dados.");

	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');

	$sql = "SELECT `index`, `imgURL`, `nome`, `nomeCient`, `dataDePlantio`, `regiaoDePlantio`, `infAdc` FROM `cultura` WHERE `index` = '$index'";
	$resultado = mysql_query($sql,$conexao);
	$row = mysql_fetch_array($resultado);
	$array = array(
	    "index" => $row['index'],
	    "imgURL" => $row['imgURL'],
	    "nome" => $row['nome'],
	    "nomeCient" =>  $row['nomeCient'],
	    "dataDePlantio" => $row['dataDePlantio'],
	    "regiaoDePlantio" => $row['regiaoDePlantio'],
	    "infAdc" => $row['infAdc'],
	);

echo json_encode($array); 
?>
