<?php

function conecta() 
{	
	$banco = "control_tccnori";
	$usuario = "control_nori";
	$senha = "Zaq12wsX";
	$hostname = "72.249.76.79";
	$conexao = mysql_connect($hostname, $usuario, $senha);
	
	mysql_select_db($banco) or die( "Não foi possível conectar ao banco de dados.");
	
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');

	if (!$conexao) 
	{
		echo "Não foi possível conectar ao banco MySQL.";
		exit;
	}
	
	return $conexao;

}
function desconecta($conexao)
{
	mysql_close($conexao);
}
?>





