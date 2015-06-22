<?php
	error_reporting(0);
	ini_set(“display_errors”, 0 );
	$imgUrl = $_POST['imgUrl'];
	$nome = $_POST['nome'];
	$nomeCient = $_POST['nomeCient'];
	$data = $_POST['data'];
	$regiao = $_POST['regiao'];
	$info = $_POST['info'];

	if(empty($imgUrl) || empty($nome) || empty($nomeCient) || empty($data) || empty($regiao) || empty($info)){
		echo "Por favor insira todos os campos";
	}else{
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
			echo "Erro ao conectar ao banco de dados";
		}else{
			$sql = "INSERT INTO `cultura`(`index`, `imgURL`, `nome`, `nomeCient`, `dataDePlantio`, `regiaoDePlantio`, `infAdc`) VALUES (NULL,'$imgUrl','$nome','$nomeCient','$data','$regiao','$info')"; 
			mysql_query($sql,$conexao) or die(mysql_error()) ;
			if(mysql_affected_rows() != -1){
				echo "Cultura adicionada com êxito";
		    }
		    else{
		    	echo "Erro ao adicionar cultura"; 
		    }
		}

	}
?>