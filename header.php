<?php
include"funcoes.php";

$query = "INSERT INTO log_acesso (pk_acesso, ip, navegador, referencia, data)
			 VALUES (NULL,'".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['HTTP_REFERER']."', NOW());";
$socket = conecta();
$result = mysql_query($query);
desconecta($socket);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="meu site, primeiro, informatica junior" name="description">
	<meta content="Atlética da FAU" name="title">
	<meta content="PT-BR" name="content-language">
	<title>Atlética FAU</title>
	<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/nivo-slider/jquery.nivo.slider.js"></script>
    
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>