<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
	include "header.php";
	include "funcoes.php";
	session_start();
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
	if(isset($_POST['adicionar']) && $refresh == false){
		$imgUrl = $_POST['imgUrl'];
		$nome = $_POST['nome'];
		$nomeCient = $_POST['nomeCient'];
		$data = $_POST['data'];
		$regiao = $_POST['regiao'];
		$info = $_POST['info'];
		unset( $_POST );

		if(empty($imgUrl) || empty($nome) || empty($nomeCient) || empty($data) || empty($regiao) || empty($info)){
			$retorno = "Falta completar os campos";
			print '<script type="text/javascript">'; 
			print 'alert("Por favor insira todos os campos")'; 
			print '</script>';  
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
		 		echo "Fudeo TUDO";
			}else{
				$sql = "SELECT COUNT(nome)
				FROM cultura as time_delta";
				$resultado = mysql_query($sql,$conexao);
				$row = mysql_fetch_array($resultado);

				foreach ($row as $value) {
					$indexNow = $value;
				}
				$sql = "INSERT INTO `cultura` (`index`, `imgURL`, `nome`, `nomeCient`, `dataDePlantio`, `regiaoDePlantio`, `infAdc`) VALUES ('$indexNow','$imgUrl','$nome','$nomeCient','$data','$regiao', '$info')"; 
				mysql_query($sql,$conexao) or die(mysql_error()) ;
				if(mysql_affected_rows() != -1){
			        print '<script type="text/javascript">'; 
					print 'alert("Cultura adicionada com êxito")'; 
					print '</script>';  
			    }
			    else{
			       	print '<script type="text/javascript">'; 
					print 'alert("Erro ao adicionar cultura")'; 
					print '</script>';  
			    }
			}

		}
	}else{
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
		}
	}
?>
<style>
	#identicalCulture{
		background: #FEFBF6;
		width: 10%;
		text-align: center;
		height: 35px;
		margin: 25px;
		float: left;
		border-radius: 5px;
		font-size: 15px;
		padding-top: 17px;
	}
</style>

<?php
	$sql = "SELECT *
	FROM cultura";
	$socket = conecta();
	$resultado = mysql_query($sql,$socket);
	$tmpCount = 0;
	while ($row = mysql_fetch_array($resultado)) {
?>

<div id="identicalCulture">
	
	<button type="button" onclick="mostrarNaTela(<?php echo $row['index'] ?>)"><b><?php echo $row['nome']; ?></b></button>
</div>

<?php
 $tmpCount ++;
}

?>

<script type="text/javascript">

</script>

</body>
</html>