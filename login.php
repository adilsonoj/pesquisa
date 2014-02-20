<? require("conexao.php"); 
include "validaAcesso.inc";
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pesquisa de Clima Organizacional - Login</title>
		
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	
	<body>
		<img src="img/header.gif" alt="DSAM">

		<hr id="top"/>
		<h2>Pesquisa de Clima Organizacional</h2>
		<hr id="bottom"/>
	
		<form id="form_login" name="form_login" METHOD = "POST" action="valida_login.php">
			Usuário: <input type="text" name="usuario" size="20"></br>
			Senha: &nbsp; <input type="password" name="senha" maxlength="8" size="12"></br>
		
			<input type="submit" value="Enviar">
		</form>
			
		<hr>	
	</body>
</html>
