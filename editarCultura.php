
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
	$index = $_POST['index'];


	$imgUrl = $_POST['imgUrl'];
	$nome = $_POST['nome'];
	$nomeCient = $_POST['nomeCient'];
	$data = $_POST['data'];
	$regiao = $_POST['regiao'];
	$info = $_POST['info'];


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

		echo "Erro ao deletar cultura"; 

	}else{
		$sql = "SELECT COUNT(nome)
		FROM cultura as time_delta";
		$resultado = mysql_query($sql,$conexao);
		$row = mysql_fetch_array($resultado);

		foreach ($row as $value) {
			$indexNow = $value;
		}
		$sql = "UPDATE  `cultura` SET  `imgURL` ='$imgUrl',`nome` ='$nome',`nomeCient` ='$nomeCient',`dataDePlantio` ='$data',`regiaoDePlantio` ='$regiao',`infAdc` ='$info' WHERE  `index` ='$index'"; 
		mysql_query($sql,$conexao) or die(mysql_error()) ;
		if(mysql_affected_rows() != -1){
 
			echo "Cultura alterado com sucesso"; 
  
	    }
	    else{

			echo "Erro ao deletar cultura"; 
 
	    }
	}
?>
