<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Login Admin</title>
  	<script>
  		document.createElement("boxTitle")
  		document.createElement("boxForm")
  	</script>
  	<style>
  		body
  		{
			background-color:#ddd;
			font-family: "Verdana", Sans, serif;
  		}
  		boxTitle 
  		{
    		display:block;
    		background-color:#ddd;
		    width: 350px;
		    padding: 50px;
		    font-size: 30px;
		    text-align: center;
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
		boxForm
		{
			display:block;
			padding-top: 20px;
			text-align: center;
			font-size: 13px;
			border:none;
		}
		#login
		{
			margin-bottom: 20px;
			border: none;
			padding: 5px;
			border-radius: 6px;
			margin-left: -5px;
		} 
		#senha
		{
			margin-bottom: 10px;
			border: none;
			padding: 5px;
			border-radius: 6px;
			margin-left: -5px;
		}
		#submitButton
		{
			background-color: #52ac46;
			border:none;
			border-radius: 5px;
			font -color: #ffffff;
			padding: 6px;
			margin-top: 10px;

		} 
  	</style>
</head>

<body>
	<boxTitle>
		<img src="leaf.png">
		<boxForm>
			<form name="form1"  METHOD="post" ACTION="bemvindo.php">
				<input class="btn btn-default" id="login" type="text" name="login" size="25" placeholder = "Login">
				<input class="btn btn-default" id="senha" type="password" name="senha" size="25" placeholder = "Senha"></br>
				<button class="btn btn-default" id="submitButton" type="submit" value="click">Logar</button>
			</form>
		</boxForm>
	</boxTitle>

</body>
</html>