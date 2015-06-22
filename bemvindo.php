<?php
	include "header.php";
?>
<style>
	#identicalCulture{
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
	<button class="btn btn-primary btn-lg" type="button" onclick="mostrarNaTela(<?php echo $row['index'] ?>)"><b><?php echo $row['nome']; ?></b></button>
</div>

<?php
 $tmpCount ++;
}

?>

<script type="text/javascript">

</script>

</body>
</html>