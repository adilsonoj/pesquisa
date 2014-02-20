<? require("conexao.php"); ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pesquisa de Clima Organizacional - Alteração de Senha</title>
		
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	
	<body>
		<img src="img/header.gif" alt="DSAM">

		<hr id="top"/>
		<h2>Formulário para Alteração de Senha</h2>
		<hr id="bottom"/>
	
		<form id="form_login" method="POST" action="alterar_senha.php">
			Por favor, digite a sua senha atual:</br>
			<input type="password" name="senha_atual" size="8">
			</br><br/>

			A seguir, digite duas vezes a sua nova senha (limite de 8 caracteres):</br>
			Nova Senha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="nova_senha" size="8"></br>
			Confirmar Senha: <input type="password" name="conf_nova_senha" size="8"></br>
		
			<input type="submit" value="Enviar">
		</form>
			
		<hr>	
	</body>
</html>
